<template>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tag Management</h3>
                                <div class="row">
                                    <div class="card-tools col-md-10">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control float-right"
                                                   placeholder="Search" v-model="search.name">
                                            <button class="btn btn-primary" v-on:click="searchTags"><i
                                                    class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-success btn-sm btn-block"
                                                v-on:click="showNewTagModal"><span class="fa fa-plus"></span> Create
                                            New
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr v-for="(tag, index) in tags" v-bind:key="index">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ tag.name }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" v-on:click="editTag(tag)">
                                                <span class="fa fa-edit"></span></button>
                                            <button class="btn btn-danger btn-sm" v-on:click="deleteTag(tag)">
                                                <span class="fa fa-trash"></span></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center" v-show="moreExists && search != null">
                                <button class="btn btn-sm btn-info" v-on:click="loadMore"><span class="fa fa-arrow-down"></span>Load More</button>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>

        </section>
        <!--create tag-->
        <b-modal ref="newTagModal" hide-footer title="Add Tag">
            <div class="d-block text-center">
                <form v-on:submit.prevent="createTag">
                    <div class="form-group">
                        <label>Enter Name</label>
                        <input type="text" v-model="tagData.name" class="form-control" placeholder="Enter Name">
                        <div style="color: red" v-if="errors.name">{{errors.name[0]}}</div>
                    </div>
                    <hr>
                    <button type="button" class="btn btn-default" v-on:click="hideNewTagModal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>Save</button>
                </form>
            </div>
        </b-modal>


        <!--edit tag-->
        <b-modal ref="editTagModal" hide-footer title="Edit Tag">
            <div class="d-block text-center">
                <form v-on:submit.prevent="updateTag">
                    <div class="form-group">
                        <label>Enter Name</label>
                        <input type="text" v-model="editTagData.name" class="form-control"
                               placeholder="Enter Name">
                        <div style="color: red" v-if="errors.name">{{errors.name[0]}}</div>
                    </div>
                    <hr>
                    <button type="button" class="btn btn-default" v-on:click="hideEditTagModal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>Update</button>
                </form>
            </div>
        </b-modal>
    </div>
</template>

<script>
    import * as tagService from '../../services/tag_service.js';

    export default {
        name: 'tag',
        data() {
            return {
                tags: [],
                tagData: {
                    name: '',
                },
                editTagData: {},
                errors: {},
                moreExists: false,
                nextPage: 0,
                search: {
                    name: ''
                },
            }
        },

        mounted() {
            this.loadMore();
        },

        methods: {
            loadTags: async function () {
                try {
                    const response = await tagService.loadTags();
                    this.tags = response.data.data;
                } catch (error) {
                    this.flashMessage.error({
                        message: 'Something error. Please refresh !',
                        time: 5000
                    });
                }
            },

            searchTags: async function() {
                let formData = new FormData();
                formData.append('name', this.search.name);

                try {
                    const response = await tagService.searchTags(formData);
                    this.tags = response.data.data;
                } catch (error) {
                    this.flashMessage.error({
                        message: 'Something error. Please refresh !',
                        time: 5000
                    });
                }
            },

            createTag: async function () {
                let formData = new FormData();
                formData.append('name', this.tagData.name);

                try {
                    const response = await tagService.createTag(formData)
                    this.tags.unshift(response.data.data);
                    this.flashMessage.success({
                        message: 'Tag stored successfully !',
                        time: 5000
                    });
                    this.tagData = {
                        name: '',
                    };

                    this.hideNewTagModal();
                } catch (error) {
                    switch (error.response.status) {
                        case 422:
                            this.errors = error.response.data.errors;
                            break;
                        default:
                            this.flashMessage.error({
                                message: 'Something error. Please try again !',
                                time: 5000
                            });
                            break;
                    }
                }
            },

            deleteTag: async function (tag) {
                if (!window.confirm(`Are you want to delete ${tag.name} ?`)) {
                    return;
                }

                try {

                    await tagService.deleteTag(tag.id);
                    this.tags = this.tags.filter(obj => {
                        return obj.id !== tag.id;
                    });

                    this.flashMessage.success({
                        message: 'Tag deleted successfully !',
                        time: 5000
                    });
                } catch (error) {
                    this.flashMessage.error({
                        message: error.response.data.message,
                        time: 5000
                    });
                }
            },

            editTag: async function (tag) {
                this.editTagData = {...tag};
                this.showEditTagModal();
            },

            updateTag: async function () {
                try {
                    const formData = new FormData();
                    formData.append('name', this.editTagData.name);
                    formData.append('_method', 'put');

                    const response = await tagService.updateTag(this.editTagData.id, formData);
                    this.tags.map(tag => {
                        if (tag.id === response.data.data.id) {
                            for (let key in response.data.data) {
                                tag[key] = response.data.data[key];
                            }
                        }
                    });

                    this.hideEditTagModal();
                    this.flashMessage.success({
                        message: 'Tag updated successfully !',
                        time: 5000
                    });
                } catch (error) {
                    this.flashMessage.error({
                        message: error.response.data.message,
                        time: 5000
                    });
                }
            },

            hideNewTagModal() {
                this.$refs.newTagModal.hide();
            },

            showNewTagModal() {
                this.$refs.newTagModal.show();
            },

            hideEditTagModal() {
                this.$refs.editTagModal.hide();
            },

            showEditTagModal() {
                this.$refs.editTagModal.show();
            },

            loadMore: async function () {
                try {
                    const response = await tagService.loadMore(this.nextPage)
                    if (response.data.data.current_page < response.data.data.last_page) {
                        this.moreExists = true;
                        this.nextPage = response.data.data.current_page + 1;
                    } else {
                        this.moreExists = false;
                    }

                    response.data.data.data.forEach(data => {
                        this.tags.push(data)
                    })
                } catch (e) {
                    this.flashMessage.error({
                        message: 'Something error during loading more tags !',
                        time: 5000
                    });
                }
            }
        },

    }
</script>

<style scoped src="../../../../public/admin/assets/plugins/font-awesome/css/font-awesome.min.css"></style>
