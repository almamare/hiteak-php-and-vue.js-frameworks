<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
        <div>
            <h3 class="float-md-start mb-0">HI-TEAK</h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a class="nav-link" aria-current="page" href="<?= $this->link ?>/">Home</a>
                <a class="nav-link active" href="<?= $this->link ?>/Login">Login</a>
            </nav>
        </div>
    </header>


    <main class="form-signin">
        <form>
            <h1 class="h3 mb-3 fw-normal">PHP AND VUE JS</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" style="color: #000;">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
    </main>

    <footer class="mt-auto text-white-50">
        <p>The library was created <a href="#" class="text-white">Hi-Teak</a>, by <a href="#" class="text-white">Ahmad Almamare</a>.</p>
    </footer>
</div>