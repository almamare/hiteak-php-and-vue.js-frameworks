<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
        <div>
            <h3 class="float-md-start mb-0">HI-TEAK</h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a class="nav-link active" aria-current="page" href="<?= $this->link ?>/">Home</a>
                <a class="nav-link" href="<?= $this->link ?>/Login">Login</a>
            </nav>
        </div>
    </header>

    <main class="px-3">
        <h1>PHP AND VUE.JD</h1>
        <p class="lead">An integrated library on the PHP programming language. The VUE JS library deals with the JavaScript programming language in addition to Bootstrap to facilitate the process of working on it quickly.</p>
        <p class="lead" id="app">
            <button class="btn btn-lg btn-light fw-bold border-white bg-white" @click="count++">{{ count }}</button>
        </p>
    </main>

    <footer class="mt-auto text-white-50">
        <p>The library was created <a href="#" class="text-white">Hi-Teak</a>, by <a href="#" class="text-white">Ahmad Almamare</a>.</p>
    </footer>
</div>