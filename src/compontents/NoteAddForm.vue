<template>
    <form class="py-4 px-3" v-on:submit.prevent="addNote()">
        <div class="mb-3">
            <label for="note_name" class="form-label">Tytuł notatki</label>
            <input type="text" class="form-control" id="note_name" v-model="newNoteName">
        </div>
        <div class="mb-3">
            <label for="note_content" class="form-label">Treść notatki</label>
            <textarea class="form-control" id="note_content" rows="5" v-model="newNoteContent"></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">
            <i class="bi bi-eye-asterisk"></i>
            Dodaj notatkę
        </button>
    </form>
</template>

<script>
    export default {
        components: {},
        data: function() {
            return {
                notes: [],
                newNoteName: null,
                newNoteContent: null,
            }
        },
        methods : {
            addNote: function() {
                var date = (new Date()).toLocaleString("pl-Pl");
                var note = {name: this.newNoteName, content: this.newNoteContent, createdAt: date };
                this.newNoteName = null;
                this.newNoteContent = null;
                this.$emit("on-add-note", note);
            }
        }
    }
</script>
