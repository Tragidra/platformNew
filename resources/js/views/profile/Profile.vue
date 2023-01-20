<template>
    <div class="col-md-9">
        <!-- Edit profile START -->
        <div class="card bg-transparent border rounded-3">
            <!-- Card header -->
            <div class="card-header bg-transparent border-bottom">
                <h3 class="card-header-title mb-0">Профиль</h3>
            </div>
            <!-- Card body START -->
            <div class="card-body">
                <!-- Form -->
                <form class="row g-4">

                    <!-- Profile picture -->
                    <div class="col-12 justify-content-center align-items-center">
                        <label class="form-label">Аватарка</label>
                        <div class="d-flex align-items-center">
                            <label class="position-relative me-4" for="uploadfile-1" title="Replace this pic">
                                <!-- Avatar place holder -->
                                <span class="avatar avatar-xl">
											<img id="uploadfile-1-preview" class="avatar-img rounded-circle border border-white border-3 shadow" :src="avatar" alt="">
										</span>
                                <input @change="changeAvatar" id="file" name="file" type="file" accept="image/*">
                                <!-- Remove btn -->
                                <button type="button" class="uploadremove"><i class="bi bi-x text-white"></i></button>
                            </label>
                            <!-- Upload button -->
                            <label class="btn btn-primary-soft mb-0" for="uploadfile-1">Изменить</label>
                            <input id="file" @change="changeAvatar" name="file" class="form-control d-none" type="file" accept="image/*">
                        </div>
                    </div>

                    <!-- Full name -->
                    <div class="col-12">
                        <label class="form-label">Имя</label>
                        <div class="input-group">
                            <input type="text" class="form-control" value="Lori" placeholder="First name">
                            <input type="text" class="form-control" value="Stevens" placeholder="Last name">
                        </div>
                    </div>

                    <!-- Phone number -->
                    <div class="col-md-6">
                        <label class="form-label">Телефон</label>
                        <input type="text" class="form-control" value="1234567890" placeholder="Phone number">
                    </div>

                    <!-- Location -->
                    <div class="col-md-6">
                        <label class="form-label">Место жительства</label>
                        <input class="form-control" type="text" value="California">
                    </div>

                    <!-- About me -->
                    <div class="col-12">
                        <label class="form-label">Обо мне</label>
                        <textarea class="form-control" rows="3">I’ve found a way to get paid for my favorite hobby, and do so while following my dream of traveling the world.</textarea>
                        <div class="form-text">Brief description for your profile.</div>
                    </div>

                    <!-- Education -->
                    <div class="col-12">
                        <label class="form-label">Коммунизм</label>
                        <input class="form-control mb-2" type="text" value="Bachelor in Computer Graphics">
                        <input class="form-control mb-2" type="text" value="Masters in Computer Graphics">
                        <button class="btn btn-sm btn-light mb-0"><i class="bi bi-plus me-1"></i>Add more</button>
                    </div>

                    <!-- Save button -->
                    <div class="d-sm-flex justify-content-end">
                        <button type="button" class="btn btn-primary mb-0">Сохранить изменения</button>
                    </div>
                </form>
            </div>
            <!-- Card body END -->
        </div>
        <!-- Edit profile END -->

        <div class="row g-4 mt-3">

            <div class="col-lg-6">
                <div class="card bg-transparent border rounded-3">
                    <!-- Card header -->
                    <div class="card-header bg-transparent border-bottom">
                        <h5 class="card-header-title mb-0">Social media profile</h5>
                    </div>
                    <!-- Card body START -->
                    <div class="card-body">
                        <!-- Facebook username -->
                        <div class="mb-3">
                            <label class="form-label"><i class="fab fa-facebook text-facebook me-2"></i>Enter facebook username</label>
                            <input class="form-control" type="text" value="loristev" placeholder="Enter username">
                        </div>

                        <!-- Twitter username -->
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-twitter text-twitter me-2"></i>Enter twitter username</label>
                            <input class="form-control" type="text" value="loristev" placeholder="Enter username">
                        </div>

                        <!-- Instagram username -->
                        <div class="mb-3">
                            <label class="form-label"><i class="fab fa-instagram text-instagram-gradient me-2"></i>Enter instagram username</label>
                            <input class="form-control" type="text" value="loristev" placeholder="Enter username">
                        </div>

                        <!-- Youtube -->
                        <div class="mb-3">
                            <label class="form-label"><i class="fab fa-youtube text-youtube me-2"></i>Add your youtube profile URL</label>
                            <input class="form-control" type="text" value="https://www.youtube.com/in/Eduport-05620abc" placeholder="Enter username">
                        </div>

                        <!-- Button -->
                        <div class="d-flex justify-content-end mt-4">
                            <button type="button" class="btn btn-primary mb-0">Save changes</button>
                        </div>
                    </div>
                    <!-- Card body END -->
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            avatar: null
        }
    },
    methods:{
        changeAvatar(){
            let file = document.getElementById('file').files[0];
            if (!file) return;
            let data = new FormData();
            data.append('image', file);
            axios.post("/api/profile/uploadImage", data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(res => {
                if (res.data.status === 'ok')
                    this.avatar = res.data.url;
            });
        },
        get_Avatar(){

            let data = {
                id: this.$store.getters['auth/user'].id
            }

            axios.post("/api/profile/getImage",data).then(res => {
                if (res.data.status === 'ok')
                    this.avatar = res.data.path_to_image;
            });
        },
        loadAvatar(){
            axios.post("/api/profile/getImage", {id:user_id})
        },
    },
    mounted() {
        this.get_Avatar();
        this.loadAvatar();
    }
}
</script>

<style scoped>

</style>
