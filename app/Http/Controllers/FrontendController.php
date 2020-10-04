<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Category;
use App\Post;
use App\Galeri;
use App\Pemohon;
use App\Pengembang;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        
        $kategori = Category::orderBy('name', 'ASC')->get();
        $kategori_menu = Category::orderBy('name', 'ASC')->get();
        $populer = Post::orderBy('view_count', 'DESC')->take(3)->get();
        $terkini = Post::orderBy('id', 'DESC')->take(3)->get();

        $jumlah_permohonan = Pemohon::where('status', 0)
                                ->orWhere('status', 1)
                                ->orWhere('status', 2)
                                ->get()->count();
        $jumlah_pengembang = Pengembang::get()->count();
        $jumlah_perumahan = Pemohon::where('status',3)->get()->count();

    	return view('index')
                ->with('categories', $kategori)
                ->with('menu_kategori', $kategori_menu)
                ->with('galeri', Galeri::take(6)->get())
    			->with('tages', Tag::all())
    			->with('articles', Post::take(8)->get())
    			->with('populer', $populer)
    			->with('terkini', $terkini)
    			->with('jumlah_pengembang', $jumlah_pengembang)
    			->with('jumlah_permohonan', $jumlah_permohonan)
    			->with('jumlah_perumahan', $jumlah_perumahan);
        
    }

      public function singlePost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $view = Post::find($post->id);
        $view->increment('view_count');

        $next_id = Post::where('id','>', $post->id)->min('id');
        $prev_id = Post::where('id','<', $post->id)->max('id');
        return view('single')->with('post', $post)
                             ->with('tags', Tag::all())
                             ->with('title', $post->title)
                             ->with('populer', $this->populer())
                             ->with('terkini', $this->terkini())
                             ->with('categories', Category::take(5)->get())
                             ->with('next', Post::find($next_id))
                             ->with('prev',Post::find($prev_id))
                             ->with('tags', Tag::all());
    }
    
    public function sidebar()
    {
        return view('partials.sidebar')
                        ->with('populer', $this->populer())
                        ->with('terkini', $this->terkini())
                        ->with('categories', Category::take(5)->get())
                        ->with('tags', Tag::all());
    }

    public function category($id)
    {
        $category = Category::find($id);
        return view('category')->with('category', $category)
                                ->with('title', $category->name)
                                ->with('populer', $this->populer())
                                ->with('terkini', $this->terkini())
                                ->with('menu_kategori', $this->menu_kategori())
                                ->with('tags', Tag::all())
                                ->with('categories', Category::take(5)->get());
    }

    public function menu_kategori()
    {
         $kategori_menu = Category::orderBy('name', 'ASC')->get();
         return $kategori_menu;
    }

    public function tag($id)
    {
        $tag = Tag::find($id);
        return   view('tag')->with('tages', $tag)
                            ->with('tags', Tag::all())
                            ->with('title', $tag->tag)
                            ->with('populer', $this->populer())
                             ->with('terkini', $this->terkini())
                             ->with('menu_kategori', $this->menu_kategori())
                             ->with('categories', Category::take(5)->get());

    }

     public function populer()
    {
        $populer = Post::orderBy('view_count', 'DESC')->take(3)->get();
        return $populer;
    }
 
    public function terkini()
    {
         $terkini = Post::orderBy('id', 'DESC')->take(3)->get();
         return $terkini;
    }

    public function kontak()
    {
        return view('kontak');
    }
}
