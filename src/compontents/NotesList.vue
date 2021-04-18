<template>
    <div class="list-group pt-3 pb-5 px-1">
        <div v-for="note in notes" v-bind:key="note.name" class="list-group-item">
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
            <h5 class="mb-1">{{ note.name }}</h5>
            <p class="text-muted">Utworzono 14:15 10.03.2021</p>
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
        methods : {},
    }
</script>
