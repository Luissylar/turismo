<script setup>
import { ref, watch, defineProps, defineEmits, onMounted } from 'vue';
import Quill from 'quill';
import 'quill/dist/quill.snow.css';

const props = defineProps({
    modelValue: String,
    options: {
        type: Object,
        default: () => ({
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'font': [] }],
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    [{ 'script': 'sub' }, { 'script': 'super' }],
                    [{ 'indent': '-1' }, { 'indent': '+1' }],
                    [{ 'direction': 'rtl' }],
                    [{ 'size': ['small', false, 'large', 'huge'] }],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'align': [] }],
                    ['link', 'image', 'video', 'formula'],
                    ['blockquote', 'code-block'],
                    ['clean']
                ]
            }
        })
    }
});

const emit = defineEmits(['update:modelValue']);

const editor = ref(null);
let quillInstance = null;

onMounted(() => {
    quillInstance = new Quill(editor.value, props.options);

    quillInstance.on('text-change', () => {
        emit('update:modelValue', quillInstance.root.innerHTML);
    });

    quillInstance.root.innerHTML = props.modelValue || '';  // Asegúrate de que no sea undefined
});

watch(() => props.modelValue, (newValue) => {
    if (quillInstance && newValue !== quillInstance.root.innerHTML) {
        quillInstance.root.innerHTML = newValue || '';  // Asegúrate de que no sea undefined
    }
});
</script>

<template>
    <div class="quill-editor">
        <div ref="editor" class="quill-editor-content"></div>
    </div>
</template>

<style scoped>
.quill-editor {
    border: 1px solid #ccc;
    border-radius: 4px;
    overflow: hidden;
}
.quill-editor-content {
    height: 300px; /* Puedes ajustar la altura según tus necesidades */
}
</style>
