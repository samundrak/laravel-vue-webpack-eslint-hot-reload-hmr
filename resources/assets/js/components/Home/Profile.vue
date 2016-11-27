<template>
    <div>
        <div class="panel-heading">Edit your profile</div>
        <div class="panel-body">
            <form @submit.prevent="updateUserProfile" class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="first_name" class="col-md-4 control-label">First Name</label>
                    <div class="col-md-6">
                        <input v-model="profile.first_name" type="text" class="form-control" name="first_name"
                               value="" required autofocus>
                        <span class="help-block">
                              <strong></strong>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="last_name" class="col-md-4 control-label">Last Name</label>
                    <div class="col-md-6">
                        <input v-model="profile.last_name" type="text" class="form-control" name="last_name"
                               value="" required autofocus>
                        <span class="help-block">
                              <strong></strong>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact_mobile" class="col-md-4 control-label">Contact</label>
                    <div class="col-md-6">
                        <input v-model="profile.contact_mobile" type="text" class="form-control" name="contact_mobile"
                               required autofocus>
                        <span class="help-block">
                              <strong></strong>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username" class="col-md-4 control-label">Username</label>
                    <div class="col-md-6">
                        <input readonly type="text" class="form-control" name="username"
                               :value="profile.username" required autofocus>
                        <span class="help-block">
                              <strong></strong>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">Email</label>
                    <div class="col-md-6">
                        <input readonly :value="profile.email" type="text" class="form-control" name="email"
                               required autofocus>
                        <span class="help-block">
                              <strong></strong>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        created() {
            this.fetchUserDetails();
        },
        data (){
            return {
                profile: {
                    id: '',
                    first_name: '',
                    last_name: '',
                    contact_mobile: '',
                    email: '',
                    username: ''
                }
            }
        },
        methods: {
            updateUserProfile(){
                this.$http.post('/api/user/' + this.profile.id, _.extend(this.profile, {
                    _method: 'PATCH'
                }))
                        .then(() => {
                            alert('Profile has been updated');
                        });
            },
            fetchUserDetails() {
                this.$http.get('/api/user')
                        .then(response => {
                            this.profile = response.data;
                        });
            }
        }
    }
</script>
