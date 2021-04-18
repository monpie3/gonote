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
                <notes-list v-bind:notes="notes"></notes-list>
            </div>
            <div class="col-12 col-md-7 col-lg-8 bg-white p-0">
                <div class="cover d-none d-sm-block"></div>
                <note-add-form v-on:onAddNote="addNote($event)"></note-add-form>
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

<script>
    import NoteAddForm from "./compontents/NoteAddForm.vue";
    import NotesList from "./compontents/NotesList.vue";

    export default {
        components: {NoteAddForm, NotesList},
        data: function() {
            return {
                notes: [],
            }
        },
        methods : {
            addNote: function(note) {
                this.notes.push(note)
            }
        }
    }
</script>



<style>
.cover {
    background-image: url("./assets/background.jpg");
    background-position: center;
    background-size: cover;
    min-height: 150px;
}
</style>
