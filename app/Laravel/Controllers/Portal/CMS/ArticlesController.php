<?php

namespace App\Laravel\Controllers\Portal\CMS;

use App\Laravel\Controllers\Portal\Controller;
use App\Laravel\Models\Article;
use App\Laravel\Services\ImageUploader;
use App\Laravel\Requests\PageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    public function index(PageRequest $request)
    {
        $user = auth('web')->user();

        $this->data['articles'] = Article::where('user_id', $user->id)
            ->latest()
            ->get();

        $this->data['deleted_articles'] = Article::onlyTrashed()
            ->where('user_id', $user->id)
            ->latest('deleted_at')
            ->get();

        $this->data['editing_article'] = null;
        $this->data['page_title'] = 'CMS Articles | AMS User Portal';

        return view('portal.cms.articles', $this->data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'description' => 'required|string|min:2',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:5000',
        ]);

        DB::beginTransaction();

        try {
            $user = auth('web')->user();

            $article = new Article();
            $article->user_id = $user->id;
            $article->name = $validated['name'];
            $article->description = $validated['description'];

            if ($request->hasFile('image')) {
                $image = ImageUploader::uploadAutoResize(
                    $request->file('image'),
                    'uploads/articles/images'
                );

                $article->path = $image['path'];
                $article->directory = $image['directory'];
                $article->filename = $image['filename'];
                $article->source = $image['source'];
            }

            $article->save();

            DB::commit();

            return redirect()
                ->route('portal.cms.articles')
                ->with('notification-status', 'success')
                ->with('notification-msg', 'Article successfully created.');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->back()
                ->withInput()
                ->with('notification-status', 'failed')
                ->with('notification-msg', 'Failed to create article.');
        }
    }

    public function edit(PageRequest $request, $id)
    {
        $user = auth('web')->user();

        $this->data['articles'] = Article::where('user_id', $user->id)
            ->latest()
            ->get();

        $this->data['deleted_articles'] = Article::onlyTrashed()
            ->where('user_id', $user->id)
            ->latest('deleted_at')
            ->get();

        $this->data['editing_article'] = Article::where('user_id', $user->id)
            ->findOrFail($id);

        $this->data['page_title'] = 'Edit Article | AMS User Portal';

        return view('portal.cms.articles', $this->data);
    }

    public function update(Request $request, $id)
    {
        $user = auth('web')->user();

        $article = Article::where('user_id', $user->id)
            ->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'description' => 'required|string|min:2',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:5000',
        ]);

        DB::beginTransaction();

        try {
            $article->name = $validated['name'];
            $article->description = $validated['description'];

            if ($request->hasFile('image')) {
                $image = ImageUploader::uploadAutoResize(
                    $request->file('image'),
                    'uploads/articles/images'
                );

                $article->path = $image['path'];
                $article->directory = $image['directory'];
                $article->filename = $image['filename'];
                $article->source = $image['source'];
            }

            $article->save();

            DB::commit();

            return redirect()
                ->route('portal.cms.articles')
                ->with('notification-status', 'success')
                ->with('notification-msg', 'Article successfully updated.');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->back()
                ->withInput()
                ->with('notification-status', 'failed')
                ->with('notification-msg', 'Failed to update article.');
        }
    }

    public function destroy(Request $request, $id)
    {
        $user = auth('web')->user();

        $article = Article::where('user_id', $user->id)
            ->findOrFail($id);

        $article->delete();

        return redirect()
            ->route('portal.cms.articles')
            ->with('notification-status', 'success')
            ->with('notification-msg', 'Article moved to deleted articles.');
    }

    public function restore(Request $request, $id)
    {
        $user = auth('web')->user();

        $article = Article::onlyTrashed()
            ->where('user_id', $user->id)
            ->findOrFail($id);

        $article->restore();

        return redirect()
            ->route('portal.cms.articles')
            ->with('notification-status', 'success')
            ->with('notification-msg', 'Article successfully restored.');
    }

    // public function toggleFeatured(PageRequest $request, $id)
    // {
    //     $user = auth('web')->user();

    //     $article = Article::where('user_id', $user->id)
    //         ->findOrFail($id);

    //     $article->is_featured = !$article->is_featured;
    //     $article->save();

    //     session()->flash('notification-status', 'success');
    //     session()->flash('notification-msg', $article->is_featured
    //         ? 'Article added to Featured.'
    //         : 'Article removed from Featured.');

    //     return redirect()->back();
    // }

    // public function toggleEditorPick(PageRequest $request, $id)
    // {
    //     $user = auth('web')->user();

    //     $article = Article::where('user_id', $user->id)
    //         ->findOrFail($id);

    //     $article->is_editor_pick = !$article->is_editor_pick;
    //     $article->save();

    //     session()->flash('notification-status', 'success');
    //     session()->flash('notification-msg', $article->is_editor_pick
    //         ? 'Article added to Editor\'s Choice.'
    //         : 'Article removed from Editor\'s Choice.');

    //     return redirect()->back();
    // }
}