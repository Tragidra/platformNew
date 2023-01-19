<template>
    <!-- Left sidebar START -->
    <div v-if="authenticated" class="col-md-3">
        <!-- Responsive offcanvas body START -->
        <div class="offcanvas-xl offcanvas-end" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
            <!-- Offcanvas header -->
            <div class="offcanvas-header bg-light">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">My profile</h5>
                <button  type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
            </div>
            <!-- Offcanvas body -->
            <div class="offcanvas-body p-3 p-xl-0">
                <div class="bg-dark border rounded-3 pb-0 p-3 w-100">
                    <!-- Dashboard menu -->
                    <div class="list-group list-group-dark list-group-borderless">
                        <router-link to="/"><a v-bind:class="{active : isActive.home}" class="list-group-item"><i class="bi bi-ui-checks-grid fa-fw me-2"></i>Показатели</a></router-link>
                        <router-link to="/courses"><a v-bind:class="{active : isActive.courses}" class="list-group-item"><i class="bi bi-card-checklist fa-fw me-2"></i>Мои курсы</a></router-link>
<!--                        <a class="list-group-item" href="student-course-list.html"><i class="bi bi-basket fa-fw me-2"></i>My Courses</a>-->
                        <router-link to="/homeworks"><a v-bind:class="{active : isActive.homeworks}" class="list-group-item"><i class="far fa-fw fa-file-alt me-2"></i>Домашние задания</a></router-link>
<!--                        <a class="list-group-item" href="student-quiz.html"><i class="bi bi-question-diamond fa-fw me-2"></i>Quiz</a>-->
<!--                        <a class="list-group-item" href="student-payment-info.html"><i class="bi bi-credit-card-2-front fa-fw me-2"></i>Payment info</a>-->
<!--                        <a class="list-group-item" href="student-bookmark.html"><i class="bi bi-cart-check fa-fw me-2"></i>Wishlist</a>-->
                        <router-link to="/profile"><a v-bind:class="{active : isActive.profile}" class="list-group-item"><i class="bi bi-pencil-square fa-fw me-2"></i>Редактировать профиль</a></router-link>
<!--                        <a class="list-group-item" href="instructor-setting.html"><i class="bi bi-gear fa-fw me-2"></i>Settings</a>-->
<!--                        <a class="list-group-item" href="instructor-delete-account.html"><i class="bi bi-trash fa-fw me-2"></i>Delete Profile</a>-->
                        <a @click="logout" class="list-group-item text-danger bg-danger-soft-hover"><i class="fas fa-sign-out-alt fa-fw me-2"></i>Выйти</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Responsive offcanvas body END -->
    </div>
    <!-- Left sidebar END -->
</template>

<script>
import {mapActions} from "vuex";

export default {
    name: "Sidebar",
    data(){
        return {
            //
        }
    },
    methods:{
        ...mapActions({
            signOut: "auth/logout"
        }),
        logout(){
            this.signOut()
            axios.post('/logout')
                .then(res => {
                    localStorage.removeItem('x_xsrf_token')
                    this.$router.push('/login')
                });
        }
    },
    computed:{
        authenticated(){
            return this.$store.getters["auth/authenticated"]
        },
        isActive(){
            if(this.$route.path === '/'){
                return {
                    home : true,
                    courses : false,
                    homeworks : false,
                    profile : false
                }
            }
            else if(this.$route.path === '/courses'){
                return {
                    home : false,
                    courses : true,
                    homeworks : false,
                    profile : false
                }
            }
            else if(this.$route.path === '/homeworks'){
                return {
                    home : false,
                    courses : false,
                    homeworks : true,
                    profile : false
                }
            }
            else if(this.$route.path === '/profile'){
                return {
                    home : false,
                    courses : false,
                    homeworks : false,
                    profile : true
                }
            }
        }
    }
}
</script>

<style scoped>

</style>
