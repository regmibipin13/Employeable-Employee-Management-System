<template>
    <file-pond
        :name="name"
        ref="pond"
        :label-idle="label"
        v-bind:allow-multiple="multiple"
        accepted-file-types="image/jpeg, image/png"
        :server="action"
        v-bind:files="myFiles"
        v-on:init="handleFilePondInit">

    </file-pond>
</template>

<script>

// Import Vue FilePond
import vueFilePond from 'vue-filepond';

// Import FilePond styles
import 'filepond/dist/filepond.min.css';

// Import FilePond plugins
// Please note that you need to install these plugins separately

// Import image preview plugin styles
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';

// Import image preview and file type validation plugins
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';

// Create component
const FilePond = vueFilePond(FilePondPluginFileValidateType, FilePondPluginImagePreview);

export default {
    name:'FileUploader',
    components: {
        FilePond
    },
    props:{
        name:{
            type:String,
            required:true,
        },
        label:{
            type:String,
            default:'Drop your photo here',
        },
        action:{
            type:String,
            default:"{{ route('admin.imageUploader') }}"
        },
        multiple:{
            type:Boolean,
            default:true,
        }
    },
    data: function() {
        return { 
            myFiles: [] 
        };
    },
    methods: {
        handleFilePondInit: function() {
            console.log('FilePond has initialized');

            // FilePond instance methods are available on `this.$refs.pond`
        }
    },
}
</script>