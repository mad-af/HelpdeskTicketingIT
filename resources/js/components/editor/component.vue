<template>
    <section>
         <vue-editor v-model="contents" :disabled="true" :editor-toolbar="customToolbar" :editorOptions="editorSettings"/>
    </section>
</template>

<style lang="scss" scope>
    @import "~vue2-editor/dist/vue2-editor.css";

    /* Import the Quill styles you want */
    @import '~quill/dist/quill.core.css';
    @import '~quill/dist/quill.bubble.css';
    @import '~quill/dist/quill.snow.css';
    .ql-editor {
        padding: 0 !important;
        min-height: 0 !important;
        font-size: 12px !important;
    }
    .ql-syntax {
        background: #f5f5f5 !important;
        color: #555555 !important;
    }
</style>

<script>
import { VueEditor, Quill } from 'vue2-editor'
import { ImageDrop } from 'quill-image-drop-module'

Quill.register('modules/imageDrop', ImageDrop)

export default {
    components: { VueEditor },
    props: { contents : String },
    data: function () {
        return {
            isDisable: null,
            customToolbar: [
                [{header: [1, 2, false]}],
                ["bold", "italic", "underline"],
                [{ list: "ordered" }, { list: "bullet" }],
                ["image", "code-block"]
            ],
            editorSettings: {
                    imageDrop: true,
                    theme: null
            }
        }
    },
    created: function () {
        this.conditionLevel('ADMIN')
    },
    methods: {
        conditionLevel: function (param) {
            switch(param) {
                case 'USER':
                    this.isDisable = false
                    this.editorSettings.theme = 'core'
                    break;
                case 'ADMIN':
                    this.isDisable = true
                    this.editorSettings.theme = 'bubble'
                    break;
            }
        }
    }
}
</script>