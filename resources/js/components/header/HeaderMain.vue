<template>
    <section v-if="authenticated" class="pt-0">
        <div class="container-fluid px-0">
            <div class="card bg-blue h-100px h-md-200px rounded-0" style="background:url(assets/images/pattern/04.png) no-repeat center center; background-size:cover;">
            </div>
        </div>
        <div class="container mt-n4">
            <div class="row">
                <div class="col-12">
                    <div class="card bg-transparent card-body pb-0 px-0 mt-2 mt-sm-0">
                        <div class="row d-sm-flex justify-sm-content-between mt-2 mt-md-0">
                            <!-- Avatar -->
                            <div class="col-auto">
                                <div class="avatar avatar-xxl position-relative mt-n3">
                                    <img class="avatar-img rounded-circle border border-white border-3 shadow" :src="profile_image" alt="">
                                    <span class="badge text-bg-success rounded-pill position-absolute top-50 start-100 translate-middle mt-4 mt-md-5 ms-n3 px-md-3">{{role_name}}</span>
                                </div>
                            </div>
                            <!-- Profile info -->
                            <div class="col d-sm-flex justify-content-between align-items-center">
                                <div>
                                    <h1 class="my-1 fs-4">{{user.name}}</h1>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item me-3 mb-1 mb-sm-0">
                                            <span class="h6">{{completed_courses}}</span>
                                            <span class="text-body fw-light">Пройдено курсов</span>
                                        </li>
                                        <li class="list-inline-item me-3 mb-1 mb-sm-0">
                                            <span class="h6">{{completed_lessons}}</span>
                                            <span class="text-body fw-light">Пройдено уроков</span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Button -->
                                <div class="mt-2 mt-sm-0">
                                    <a @click="$router.push('/courses')" class="btn btn-outline-primary mb-0">Посмотреть мои курсы</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Advanced filter responsive toggler START -->
                    <!-- Divider -->
                    <hr class="d-xl-none">
                    <div class="col-12 col-xl-3 d-flex justify-content-between align-items-center">
                        <a class="h6 mb-0 fw-bold d-xl-none" href="#">Menu</a>
                        <button class="btn btn-primary d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                            <i class="fas fa-sliders-h"></i>
                        </button>
                    </div>
                    <!-- Advanced filter responsive toggler END -->
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "HeaderMain",
    data(){
        return{
            profile_image: '',
            completed_courses: 0,
            completed_lessons: 0,
            role_name: ''
        }
    },
    computed:{
        authenticated(){
            return this.$store.getters["auth/authenticated"]
        },
        user(){
            return this.$store.getters["auth/user"]
        }
    },
    methods:{
        getInfo(){
            axios.post('api/profile/getInfoForHeader').then(res =>{
                if(res.data.status === 'ok'){
                    this.profile_image = res.data.profile_image
                    this.completed_courses = res.data.completed_courses
                    this.completed_lessons = res.data.completed_lessons
                    this.role_name = res.data.role_name
                }
            });
        }
    },
    mounted() {
        this.getInfo()
    }
}
</script>

<style scoped>

</style>
