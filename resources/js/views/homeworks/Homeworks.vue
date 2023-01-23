<template>
    <!-- Main content START -->
    <div class="col-md-9">
        <!-- Student review START -->
        <div class="card border bg-transparent rounded-3" v-if="$store.getters['auth/user'].role_id === 2">
            <!-- Header START -->
            <div class="card-header bg-transparent border-bottom">
                <div class="row justify-content-between align-middle">
                    <!-- Title -->
                    <div class="col-sm-6">
                        <h3 class="card-header-title mb-2 mb-sm-0">Student review</h3>
                    </div>

                    <!-- Short by filter -->
                    <div class="col-sm-4">
                        <form>
                            <select class="form-select js-choice z-index-9 bg-white" aria-label=".form-select-sm">
                                <option value="">Sort by</option>
                                <option>★★★★★ (5/5)</option>
                                <option>★★★★☆ (4/5)</option>
                                <option>★★★☆☆ (3/5)</option>
                                <option>★★☆☆☆ (2/5)</option>
                                <option>★☆☆☆☆ (1/5)</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Header END -->

            <!-- Reviews START -->
            <div class="card-body mt-2 mt-sm-4">

                <!-- Review item START -->
                <div class="d-sm-flex">
                    <!-- Avatar image -->
                    <img class="avatar avatar-lg rounded-circle float-start me-3" src="assets/images/avatar/01.jpg" alt="avatar">
                    <div>
                        <div class="mb-3 d-sm-flex justify-content-sm-between align-items-center">
                            <!-- Title -->
                            <div>
                                <h5 class="m-0">Frances Guerrero</h5>
                                <span class="me-3 small">June 11, 2021 at 6:01 am </span>
                            </div>
                            <!-- Review star -->
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="far fa-star text-warning"></i></li>
                            </ul>
                        </div>
                        <!-- Content -->
                        <h6><span class="text-body fw-light">Review on:</span> How to implement sitemap on sass</h6>
                        <p>Satisfied conveying a dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do. </p>
                        <!-- Button -->
                        <div class="text-end">
                            <a href="#" class="btn btn-sm btn-primary-soft mb-1 mb-sm-0">Direct message</a>
                            <a class="btn btn-sm btn-light mb-0" data-bs-toggle="collapse" href="#collapseComment" role="button" aria-expanded="false" aria-controls="collapseComment">
                                Reply
                            </a>
                            <!-- collapse textarea -->
                            <div class="collapse show" id="collapseComment">
                                <div class="d-flex mt-3">
                                    <textarea class="form-control mb-0" placeholder="Add a comment..." rows="2" spellcheck="false"></textarea>
                                    <button class="btn btn-sm btn-primary-soft ms-2 px-4 mb-0 flex-shrink-0"><i class="fas fa-paper-plane fs-5"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Divider -->
                <hr>
                <!-- Review item END -->

            </div>
            <!-- Reviews END -->

            <div class="card-footer border-top">
                <!-- Pagination START -->
                <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                    <!-- Content -->
                    <p class="mb-0 text-center text-sm-start">Showing 1 to 8 of 20 entries</p>
                    <!-- Pagination -->
                    <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                        <ul class="pagination pagination-sm pagination-primary-soft my-0 py-0">
                            <li class="page-item my-0"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i></a></li>
                            <li class="page-item my-0"><a class="page-link" href="#">1</a></li>
                            <li class="page-item my-0 active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item my-0"><a class="page-link" href="#">3</a></li>
                            <li class="page-item my-0"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
                <!-- Pagination END -->
            </div>
        </div>
         Student review END



        <!-- Card item START -->
        <div class="col-lg-10 col-xxl-6" v-if="$store.getters['auth/user'].role_id === 1">
            <div class="card rounded overflow-hidden shadow">
                <div class="row g-0">
                    <!-- Image -->
                    <div class="col-md-4">
                        <img src="assets/images/courses/4by3/01.jpg" alt="card image">
                    </div>

                    <!-- Card body -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <!-- Title -->
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="card-title mb-0"><a href="#">The Complete Digital Marketing Course - 12 Courses in 1</a></h5>
                                <!-- Wishlist icon -->
                                <a href="#"><i class="fas fa-heart text-danger"></i></a>
                            </div>
                            <!-- Content -->
                            <!-- Info -->
                            <ul class="list-inline mb-1">
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="fas fa-table text-orange me-2"></i>82 lectures</li>
                                <li class="list-inline-item h6 fw-light"><i class="fas fa-signal text-success me-2"></i>Senior</li>
                            </ul>
                            <!-- Rating -->
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item h6 fw-light mb-1 mb-sm-0"><i class="far fa-clock text-danger me-2"></i></li>
                                <li class="list-inline-item me-0 small">Date start</li>
                                <li class="list-inline-item me-0 small">2033-12-66</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card item END -->

    </div>
    <!-- Main content END -->
</template>

<script>
export default {
    name: "Homeworks",

    data() {
        return {

        }
    },
}
</script>

<style scoped>

</style>
