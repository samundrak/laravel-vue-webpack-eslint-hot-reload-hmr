<template>
    <div>
        <div class="panel-heading">Upload your profile.</div>
        <div class="panel-body">
            <form action="/upload" method="post" enctype="multipart/form-data"
                  class="form-horizontal" role="form">
                <input type="hidden" name="_token" :value="csrf_token">
                <div class="form-group">
                    <label for="descriptions" class="col-md-4 control-label">Descriptions</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="descriptions"></textarea>
                        <span class="help-block">
                              <strong></strong>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="resume" class="col-md-4 control-label">Resume</label>
                    <div class="col-md-6">
                        <input type="file" class="form-control" name="resume"
                               value="" required autofocus>
                        <span class="help-block">
                              <strong></strong>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Upload
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                csrf_token: Laravel.csrfToken
            }
        }
    }
</script>
