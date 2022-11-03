@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{ translate('Blog Information') }}</h5>
                </div>
                <div class="card-body">
                    <form id="add_form" class="form-horizontal" action="{{ route('blog.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h5 class="mb-0 h6">{{ translate('Blog Arabic Information') }}</h5>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                {{ translate('Blog Arabic Title') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" placeholder="{{ translate('Blog Arabic Title') }}"
                                    onkeyup="makeSlugar(this.value)" id="title_ar" name="title_ar" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row" id="category">
                            <label class="col-md-3 col-from-label">
                                {{ translate('Category') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <select class="form-control aiz-selectpicker" name="category_id" id="category_id"
                                    data-live-search="true" required>
                                    <option>--</option>
                                    @foreach ($blog_categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->{'category_name_' . locale()} }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ translate('Arabic Slug') }}
                                <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" placeholder="{{ translate('Arabic Slug') }}" name="slug_ar"
                                    id="slug_ar" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">
                                {{ translate('Banner') }}
                                <small>(1300x650)</small>
                            </label>
                            <div class="col-md-9">
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            {{ translate('Browse') }}
                                        </div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="banner" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                {{ translate('Arabic Short Description') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <textarea name="short_description_ar" rows="5" class="form-control" required=""></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">
                                {{ translate('Arabic Description') }}
                            </label>
                            <div class="col-md-9">
                                <textarea class="aiz-text-editor" name="description_ar"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ translate('Arabic Meta Title') }}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="meta_title_ar"
                                    placeholder="{{ translate('Arabic Meta Title') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">
                                {{ translate('Meta Image') }}
                                <small>(200x200)+</small>
                            </label>
                            <div class="col-md-9">
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                            {{ translate('Browse') }}
                                        </div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="meta_img" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ translate('Arabic Meta Description') }}</label>
                            <div class="col-md-9">
                                <textarea name="meta_description_ar" rows="5" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                {{ translate('Arabic Meta Keywords') }}
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="meta_keywords_ar" name="meta_keywords_ar"
                                    placeholder="{{ translate('Arabic Meta Keywords') }}">
                            </div>
                        </div>

                        <div class="card-header">
                            <h5 class="mb-0 h6">{{ translate('Blog English Information') }}</h5>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                {{ translate('Blog English Title') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" placeholder="{{ translate('Blog English Title') }}"
                                    onkeyup="makeSlugen(this.value)" id="title_en" name="title_en" class="form-control"
                                    required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ translate('English Slug') }}
                                <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" placeholder="{{ translate('English Slug') }}" name="slug_en"
                                    id="slug_en" class="form-control" required>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                {{ translate('English Short Description') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">
                                <textarea name="short_description_en" rows="5" class="form-control" required=""></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">
                                {{ translate('English Description') }}
                            </label>
                            <div class="col-md-9">
                                <textarea class="aiz-text-editor" name="description_en"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ translate('English Meta Title') }}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="meta_title_en"
                                    placeholder="{{ translate('English Meta Title') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{ translate('English Meta Description') }}</label>
                            <div class="col-md-9">
                                <textarea name="meta_description_en" rows="5" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                {{ translate('English Meta Keywords') }}
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="meta_keywords_en" name="meta_keywords_en"
                                    placeholder="{{ translate('English Meta Keywords') }}">
                            </div>
                        </div>

                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary">
                                {{ translate('Save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function makeSlugar(val) {
            let str = val;
            let output = str.replace(/\s+/g, '-').toLowerCase();
            $('#slug_ar').val(output);
        }

        function makeSlugen(val) {
            let str = val;
            let output = str.replace(/\s+/g, '-').toLowerCase();
            $('#slug_en').val(output);
        }

    </script>
@endsection
