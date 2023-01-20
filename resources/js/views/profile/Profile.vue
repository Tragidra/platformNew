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
                                <!-- Remove btn -->
                                <button type="button" @click="DeleteImage" class="uploadremove"><i class="bi bi-x text-white"></i></button>

                            </label>
                            <!-- Upload button -->
                            <label class="btn btn-primary-soft mb-0" for="uploadfile-1" @click="status_file = !status_file">Изменить</label>
                        </div>
                        <div v-if="status_file">
                            <input id="file" @change="changeAvatar" name="file" type="file" accept="image/*">
                        </div>
                    </div>

                    <!-- Full name -->
                    <div class="col-6">
                        <label class="form-label">Имя и Фамилия</label>
                        <div class="input-group">
                            <input type="text" class="form-control" v-model="user.name">
                        </div>
                    </div>

                    <!-- Phone number -->
                    <div class="col-md-6">
                        <label class="form-label">Телефон</label>
                        <input type="text" class="form-control" v-model="user.phone">
                    </div>

                    <!-- age -->
                    <div class="col-md-6">
                        <label class="form-label">Возраст</label>
                        <input class="form-control" type="text" v-model="profile.age">
                    </div>

                    <!-- Location -->
                    <div class="col-md-6">
                        <label class="form-label">Город</label>
                        <input class="form-control" type="text" v-model="profile.location">
                    </div>

                    <!-- Education -->
                    <div class="col-6">
                        <label class="form-label">Образование</label>
                        <input class="form-control mb-2" type="text" v-model="profile.education">
                    </div>

                    <!-- About me -->
                    <div class="col-6">
                        <label class="form-label">Обо мне</label>
                        <textarea class="form-control" v-model="profile.about" rows="3"></textarea>
                        <div class="form-text">Какие у тебя увлечения?</div>
                    </div>

                    <!-- Save button -->
                    <div class="d-sm-flex justify-content-end">
                        <button type="button" @click="SaveInfo" class="btn btn-primary mb-0 text-light">Сохранить изменения</button>
                    </div>
                </form>
            </div>
            <!-- Card body END -->
        </div>
        <!-- Edit profile END -->

    </div>
</template>

<script>
export default {
    data(){
        return{
            avatar: null,
            status_file: false,

            profile: null,
            user: null
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
        SaveInfo(){
            let info = {
                name: this.user.name,
                phone: this.user.phone,
                age: this.profile.age,
                location: this.profile.location,
                education: this.profile.education,
                about: this.profile.about
            }
            axios.post("/api/profile/saveInfo", info).then(res => {
                if (res.data.status === 'ok')
                    this.avatar = res.data.url;
            });
        },
        getInfoProfile(){
            axios.post("/api/profile/getProfile").then(res => {
                if (res.data.status === 'ok')
                    this.profile = res.data.profile;
                    this.user = res.data.user
            });
        },
        DeleteImage(){
            axios.post("/api/profile/deleteImage").then(res => {
                if (res.data.status === 'ok')
                    this.profile = res.data.profile;
            });
        },
    },
    mounted() {
        this.get_Avatar();
        this.getInfoProfile();
    }
}
</script>

<style scoped>

</style>
