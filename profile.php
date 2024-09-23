<?php
// Start the session
session_start();
// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}
?>
<?php include 'layouts/header.php';?>
<?php include 'layouts/sidebar.php';?>
<!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">Profile</h2>
            <div class="hidden h-full py-1 sm:flex">
                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
            </div>
            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                <li class="flex items-center space-x-2">
                    <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="#">Staffs</a>
                    <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </li>
                <li>Profile</li>
            </ul>
        </div>

        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
            <div class="col-span-12 lg:col-span-4">
                <div class="card p-4 sm:p-5">
                    <div class="flex items-center space-x-4">
                        <div class="avatar size-14">
                            <img class="rounded-full" src="assets/images/avatar/avatar-20.jpg" alt="avatar" />
                        </div>
                        <div>
                            <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">Travis Fuller</h3>
                            <p class="text-xs+">Author</p>
                        </div>
                    </div>
                    <ul class="mt-6 space-y-1.5 font-inter font-medium">
                        <li>
                            <a class="flex items-center space-x-2 rounded-lg bg-primary px-4 py-2.5 tracking-wide text-white outline-none transition-all dark:bg-accent" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Account</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-8">
                <div class="card">
                    <div class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 dark:border-navy-500 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5">
                        <h2 class="text-lg font-medium tracking-wide text-slate-700 dark:text-navy-100">Account Setting</h2>
                        <div class="flex justify-center space-x-2">
                            <button id="cancel" class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">Cancel</button>
                            <button id="save" class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">Save</button>
                        </div>
                    </div>
                    <div class="p-4 sm:p-5">
                        <<div class="flex flex-col">
    <span class="text-base font-medium text-slate-600 dark:text-navy-100">Avatar</span>
    <div class="avatar mt-1.5 size-20 relative">
        <img id="avatar-image" class="mask is-squircle" src="assets/images/avatar/avatar-20.jpg" alt="avatar" />
        <div class="absolute bottom-0 right-0 flex items-center justify-center rounded-full bg-white dark:bg-navy-700">
            <label for="avatar-upload" class="btn size-6 rounded-full border border-slate-200 p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:border-navy-500 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                </svg>
                <input type="file" id="avatar-upload" class="hidden" accept="image/*" />
            </label>
        </div>
    </div>
</div>

                        <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <label class="block">
                                <span>Display name </span>
                                <span class="relative mt-1.5 flex">
                                    <input id="display_name" class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Enter name" type="text" />
                                    <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <i class="fa-regular fa-user text-base"></i>
                                    </span>
                                </span>
                            </label>
                            <label class="block">
    <span>Password</span>
    <span class="relative mt-1.5 flex">
        <input id="password" class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Enter new password" type="password" />
        <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
            <i class="fa fa-lock"></i>
        </span>
    </span>
</label>
                            <label class="block">
                                <span>Email Address </span>
                                <span class="relative mt-1.5 flex">
                                    <input id="email" class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Enter email address" type="text" />
                                    <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <i class="fa-regular fa-envelope text-base"></i>
                                    </span>
                                </span>
                            </label>
                            <label class="block">
                                <span>Phone Number</span>
                                <span class="relative mt-1.5 flex">
                                    <input id="phone" class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Enter phone number" type="text" />
                                    <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </div>
    <!-- 
        This is a place for Alpine.js Teleport feature 
        @see https://alpinejs.dev/directives/teleport
      -->
    <div id="x-teleport-target"></div>
     <!-- Other head content -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#save').click(function() {
            var display_name = $('#display_name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var password = $('#password').val();
            var profile_picture_input = $('#profile_picture')[0];
            var profile_picture = profile_picture_input && profile_picture_input.files.length > 0 ? profile_picture_input.files[0] : null;

            var formData = new FormData();
            formData.append('display_name', display_name);
            formData.append('email', email);
            formData.append('phone', phone);
            formData.append('password', password);
            if (profile_picture) {
                formData.append('profile_picture', profile_picture);
            }

            $.ajax({
                url: 'include/update_profile.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status == 'success') {
                        toastr.success(res.message);
                    } else {
                        toastr.error(res.message);
                    }
                },
                error: function() {
                    toastr.error('An error occurred while updating the profile.');
                }
            });
        });

        $('#cancel').click(function() {
            // Reset form fields or add any cancel logic here
        });
    });
</script>

<script>
    document.getElementById('avatar-upload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatar-image').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
    <script>
      window.addEventListener("DOMContentLoaded", () => Alpine.start());
    </script>
  </body>
</html>
