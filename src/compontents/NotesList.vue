<template>
    <div class="list-group pt-3 pb-5 px-1">
        <div v-for="note in notes" v-bind:key="note.name" class="list-group-item">
            <div class="float-end">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-danger" v-on:click="deleteNote(note)">
                        <i class="bi-trash-fill"></i>
                    </button>
                    <button type="button" class="btn btn-outline-secondary" v-on:click="showNote(note)">
                        <i class="bi-eye-fill"></i>
                    </button>
                </div>
            </div>
            <h5 class="mb-1 text-break text-wrap">{{ note.name }}</h5>
            <small class="text-muted">Utworzono {{ note.date }} </small>
        </div>
    </div>
</template>

<script>
    export default {
        components: {},
        props: ['notes'],
        data: function() {
            return {}
        },
        methods : {
            showNote: function (note) {
                this.$emit("on-show-note", note);
            },
            deleteNote: function (note) {
                this.$emit("on-delete-note", note);
            },
        },
    }
</script>
