<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.index')->with('pages', Page::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request,[

            'title' => 'required|max:255',
            'featured' => 'required|image',
            'content' => 'required'
        ]);

        $featured = $request->featured;
        $featured_new_name = uniqid().$featured->getClientOriginalName();

        $featured->move('uploads/pages', $featured_new_name);

        $page = Page::create([

            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/pages/'.$featured_new_name,
            'slug' => str_slug($request->title),
            'user_id' => 1
        ]);

            return redirect()->route('page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        // $page =  Page::find($id);

        if($request->hasFile('featured'))
        {
            $featured = $request->featured;
            $featured_new_name = uniqid().$featured->getClientOriginalName();
            $featured->move('uploads/pages/', $featured_new_name);
            $page->featured = 'uploads/pages/'.$featured_new_name;
        }

        $page->title = $request->title;
        $page->content = $request->content;
        $page->slug = str_slug($request->title);
        $page->user_id = 1;

        $page->save();

        Session()->flash('success', 'Halaman statis sudah diupdate.');

        return redirect()->route('page.index');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $file = public_path().'/'.$page->featured;
        if(file_exists($file)){
            @unlink($file);
        }
         $page->delete();
         return redirect()->route('page.index')
                        ->with('success','Halaman Statis berhasil dihapus');
    }
}
