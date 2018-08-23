
        <br>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Category Name<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {{ Form::file('icon',null, array('class' => 'form-control col-md-7 col-xs-12','required'=>'')) }}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Description
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {{ Form::text('social_network',null, array('class' => 'form-control col-md-7 col-xs-12')) }}
                </div>
            </div>
