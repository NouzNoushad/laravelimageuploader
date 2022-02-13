<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Image Uploader</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <form class="d-flex" action={{route('search.searchImage')}} method="POST">
                @csrf
                <input class="form-control me-2" name="search" placeholder="Search Image" aria-label="Search">
                <button class="btn btn-primary me-5" type="submit" name="submit">Search</button>
            </form>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/gallery">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/upload">Upload</a>
        </li>
    </div>
  </div>
</nav>
