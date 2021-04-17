<template>
    <div class="container-fluid p-0 m-0">
        <div class="row p-0 m-0">
            <div class="col-12 col-md-5 col-lg-4 bg-light p-0">
                <h3 class="w-100 text-center p-4">
                    <i class="bi bi-journal-check text-secondary"></i>
                    GoNote
                </h3>
                <button type="button" class="btn btn-dark w-100 py-2 rounded-0">
                    <i class="bi bi-pen-fill"></i>
                    Stwórz nową notatkę
                </button>
                <div class="alert alert-secondary m-3 text-center">
                    <i class="bi bi-emoji-frown"></i>
                    Jeszcze nie ma żadnych notatek do wyświetlenia
                </div>
                <div class="list-group pt-3 pb-5 px-1">
                    <div class="list-group-item">
                        <div class="float-end">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-outline-danger">
                                    <i class="bi-trash-fill"></i>
                                </button>
                                <button type="button" class="btn btn-outline-secondary">
                                    <i class="bi-eye-fill"></i>
                                </button>
                            </div>
                        </div>
                        <h5 class="mb-1">Notatka 1</h5>
                        <p class="text-muted">Utworzono 14:15 10.03.2021</p>
                    </div>

                    <div class="list-group-item">
                        <div class="float-end">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-outline-danger">
                                    <i class="bi-trash-fill"></i>
                                </button>
                                <button type="button" class="btn btn-outline-secondary">
                                    <i class="bi-eye-fill"></i>
                                </button>
                            </div>
                        </div>
                        <h5 class="mb-1">Notatka 2</h5>
                        <p class="text-muted">Utworzono 19:15 10.03.2021</p>
                    </div>

                    <div class="list-group-item">
                        <div class="float-end">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-outline-danger">
                                    <i class="bi-trash-fill"></i>
                                </button>
                                <button type="button" class="btn btn-outline-secondary">
                                    <i class="bi-eye-fill"></i>
                                </button>
                            </div>
                        </div>
                        <h5 class="mb-1">Notatka 3</h5>
                        <p class="text-muted">Utworzono 19:40 16.03.2021</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-8 bg-white p-0">
                <div class="cover d-none d-sm-block"></div>
                <form class="py-4 px-3">
                    <div class="mb-3">
                        <label for="note_name" class="form-label">Tytuł notatki</label>
                        <input type="text" class="form-control" id="note_name" placeholder="My first note..">
                    </div>
                    <div class="mb-3">
                        <label for="note_content" class="form-label">Treść notatki</label>
                        <textarea class="form-control" id="note_content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-eye-asterisk"></i>
                        Stwórz nową notatkę
                    </button>
                </form>
            </div>
        </div>
    </div>
    <nav class="navbar fixed-bottom navbar-dark bg-dark">
        <div class="container-fluid justify-content-end p-2">
            <span class="text-muted mx-5 d-none d-md-block">
                ©2021 Polityka prywatności | Warunki korzystania z usługi
            </span>
            <span class="text-light">
                <i class="bi bi-heart-fill"></i>
                Moje konto
            </span>
        </div>
    </nav>
</template>

<style>
.cover {
    background-image: url("./assets/background.jpg");
    background-position: center;
    background-size: cover;
    min-height: 150px;
}
</style>
