<template>
    <div class="container-fluid p-0 m-0 vh-100">
        <div class="row p-0 m-0 h-100">
            <div class="col-12 col-md-5 col-lg-4 bg-light p-0 h-100">
                <h3 class="w-100 text-center p-4">
                    <i class="bi bi-journal-check text-secondary"></i>
                    GoNote
                </h3>
                <button type="button" class="btn btn-dark w-100 py-2 rounded-0" v-on:click="showAddForm()">
                    <i class="bi bi-pen-fill"></i>
                    Stwórz nową notatkę
                </button>
                <div v-if="notes.length == 0" class="alert alert-secondary m-3 text-center">
                    <i class="bi bi-emoji-frown"></i>
                    Jeszcze nie ma żadnych notatek do wyświetlenia
                </div>
                <notes-list v-bind:notes="notes" v-on:onShowNote="showNote($event)" v-on:onDeleteNote="deleteNote($event)"></notes-list>
            </div>
            <div class="col-12 col-md-7 col-lg-8 bg-white p-0 h-100 border-start">
                <div class="cover d-none d-sm-block"></div>
                <note v-if="currentNote != null" v-bind:note="currentNote"></note>
                <note-add-form v-else-if="showForm" v-on:onAddNote="addNote($event)"></note-add-form>
            </div>
        </div>
    </div>
    <nav class="navbar fixed-bottom navbar-dark bg-dark">
        <div class="container-fluid justify-content-end p-2">
            <span class="text-muted mx-5 d-none d-md-block">
                ©2021 Polityka prywatności | Warunki korzystania z usługi
            </span>
            <span class="text-light pe-2">
                <i class="bi bi-heart-fill pe-1"></i>
                Moje konto
            </span>
        </div>
    </nav>
</template>

<script>
    import NoteAddForm from "./compontents/NoteAddForm.vue";
    import NotesList from "./compontents/NotesList.vue";
    import Note from "./compontents/Note.vue";

    export default {
        components: {NoteAddForm, NotesList,  Note},
        data: function() {
            return {
                notes: [],
                currentNote: null,
                showForm: true,
            }
        },
        methods : {
            addNote: function(note) {
                var newNote = {
                    name: note.name,
                    content: note.content,
                };
                this.$http.post('notes', newNote).then((response) => {
                this.notes.push(response.data);
                this.showForm = true;
                });
            },
            showNote: function(note) {
                this.currentNote = note;
                this.showForm = false;
            },
            showAddForm: function() {
                this.currentNote = null;
                this.showForm = true;
            },
            deleteNote: function(note) {
                this.$http.delete(`notes/${note.id}`).then(() => {
                    if (this.currentNote === note || this.notes.length == 0) {
                        this.currentNote = null;
                        this.showForm = true;
                    }
                    this.loadNotes();
                });
            },
            loadNotes: function() {
                this.$http.get('notes').then(response => {
                    this.notes = response.data;
                });
            }
        },
        mounted() {
            this.$http.get('notes').then(response => {
                this.notes = response.data;
            });
        },   
    };
</script>



<style>
.cover {
    background-image: url("./assets/background.jpg");
    background-position: center;
    background-size: cover;
    min-height: 150px;
}
</style>
