<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<button onclick="orderPro('new')" class="filter-link stext-106 trans-04">
										Newness
									</button>
								</li>

								<li class="p-b-6">
									<button onclick="orderPro('old')"  class="filter-link stext-106 trans-04">
										Oldest
									</button>
								</li>


								<li class="p-b-6">
									<button onclick="orderPro('low')"  class="filter-link stext-106 trans-04">
										Price: Low to High
									</button>
								</li>

								<li  class="p-b-6">
									<button onclick="orderPro('high')"  class="filter-link stext-106 trans-04">
										Price: High to Low
									</button>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<button onclick="findCash(0)" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</button>
								</li>

								<li class="p-b-6">
									<button onclick="findCash(100000)" class="filter-link stext-106 trans-04">
										0 - 100.000
									</button>
								</li>

								<li class="p-b-6">
									<button onclick="findCash(300000)" class="filter-link stext-106 trans-04">
										100.000 - 300.000
									</button>
								</li>

								<li class="p-b-6">
									<button onclick="findCash(500000)" class="filter-link stext-106 trans-04">
										300.000 - 500.000
									</button>
								</li>

								<li class="p-b-6">
									<button onclick="findCash(500001)" class="filter-link stext-106 trans-04">
										500.000+
									</button>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>