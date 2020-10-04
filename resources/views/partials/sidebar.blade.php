<div class="col-lg-3 blog-left-col mb-25 mb-xs-20 mt-md-50">
    <div class="sidebar">
        <div class="widget widget-categories">
            <h3 class="widget-title">Kategori</h3>
            <ul>
                @foreach ($categories as $category)
            <li><a href="{{ route('category.single', $category->id) }}">{{ $category->name }}</a><span>{{ count($category->posts) }}</span></li>
                @endforeach
            </ul>
        </div>
        <div class="widget widget-recent-post">
            <h3 class="widget-title">Post Terbaru</h3>
            <ul class="recent-post-list">

                @foreach ($terkini as $t)
                <li class="recent-post-list-li">
                    <div class="media">
                        <a class="recent-post-thum" href="#">
                        <img src="{{ asset($t->featured) }}" class="img-fluid" alt="{{ $t->title }}" />
                        </a>
                        <div class="media-body">
                        <a href="{{ route('post.single', $t->slug) }}">{{ $t->title }}</a>
                            <span class="post-date">{{  $t->created_at->format('j F Y') }}</span>
                        </div>
                    </div>
                </li>
                @endforeach
               
            </ul>
        </div>
        <div class="widget widget-tag-cloud">
            <h3 class="widget-title">Tag</h3>
            <div class="tagcloud">
                @foreach ($tags as $tag)
                    <a href="{{ route('tag.single', $tag->id) }}" class="tag-cloud-link">{{ $tag->tag }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>