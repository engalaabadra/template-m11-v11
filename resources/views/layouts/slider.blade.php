	<!-- Home Slider Start -->
    <div class="dc-innerbanner-holder dc-haslayout">
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12">
						<div class="dc-innerbanner">
							<form action="{{route('doctors')}}" method="get" class="dc-formtheme dc-form-advancedsearch dc-innerbannerform">
								<fieldset>
									<div class="form-group">
										<input value="{{old('search')}}" type="text" name="search" class="form-control" placeholder="@lang('custom.Search doctors, clinics, hospitals, etc.')">
									</div>

									<div class="dc-btnarea">
										<button type="submit" class="dc-btn text-white">@lang('custom.Search')</button>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Home Slider End -->
