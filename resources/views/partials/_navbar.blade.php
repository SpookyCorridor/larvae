<nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
          
            <a class="navbar-brand" href="{{url('/articles')}}">Larvae</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="/articles">Articles</a></li>
              <li><a href="{{url('/bookmarks')}}">Bookmarks</a></li>             
            </ul>
            @unless (empty($latest))
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">latest: </a></li>
              <li id="latest">{!! link_to_action('ArticlesController@show', $latest->title, [$latest->id]) !!}</li>             
              <!-- link_to_action(action (/article), title of link, route after / so... article/16 for ex ) --> 
            </ul>
            @endunless
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>