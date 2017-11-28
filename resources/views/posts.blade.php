<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Posts {{ config('app.name') }}</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">Posts</h1>

          <!-- Blog Post -->
          @foreach($posts as $post)
          <div class="card mb-4">
            <div class="card-body">
              <h2 class="card-title">{{ $post->title }}</h2>
              <p class="card-text">{{ str_limit($post->body, 200) }}</p>
              <a href="{{ route('post', $post) }}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted {{ $post->created_at->diffForHumans() }}
            </div>
          </div>
          @endforeach
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
          @auth
          <!-- New Post Widget -->
          <div class="card my-4">
            <h5 class="card-header">New Post</h5>
            <div class="card-body">
              <form method="POST" action="{{ route('create') }}">
              {{ csrf_token() }}
                <div class="form-group">
                  <label for="title">Title:</label>
                  <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                  <label for="body">Content:</label>
                    <textarea class="form-control" rows="5" id="body" name="body"></textarea>
                </div>
                <button class="btn btn-primary">Post</button>
              </form>
            </div>
          </div>
          @else
          <div class="card my-4">
            <p class="text-center"><a href="{{  route('login') }}">Login</a> to make a post</p>
          </div>
          @endauth
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; {{ config('app.name') }} {{ date('Y') }}</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </body>

</html>
