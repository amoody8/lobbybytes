<script type="text/javascript" src="https://wr.wyndhamrewards.com/common/Js/wr_widgetcontrol.js"></script>
<div id="iWidget" class="wyndhamWidget"></div>
<script type="text/javascript">
	$(document).ready(function(){
		myWidget();
	});
	
	function myWidget(){
		try {

		var wrwidget = Wyndham.WyndhamRewards.WRWidget.init(); 
		wrwidget.assign({ 
			// booking path parameters
			WHGWR_parampass:{ 
				1: 'param1=', 
				2: 'param2=', 
				3: 'param3=' 
			}, 
			// widget setup parameters
			WHGWR_alignment:       'left',
			WHGWR_targetSite:      'http://www.dreamhotels.com',
			
			
			
						
			
				
				
					WHGWR_isRedeemChecked: false,
				
											
			 
			WHGWR_defaultWhere:    '',
			WHGWR_CheckInDate:     '', // mm/dd/yyyy
			WHGWR_CheckOutDate:    '', // mm/dd/yyyy
			WHGWR_NoOfRooms:       '', 
			WHGWR_NoOfAdults:      '', 
			WHGWR_NoOfChildren12:  '', 
			WHGWR_NoOfChildren17:  '', 
			WHGWR_SelRatePlan:     '', 
			WHGWR_CorporateCode:   '', 
			WHGWR_RateCode:        '', 
			WHGWR_BrandCode:       '',
			WHGWR_First_Name:      "",
			WHGWR_Last_Name:       "",
			WHGWR_Language:        'en',
            WHGWR_iata:            ''
			
		}); 

		Wyndham.WyndhamRewards.WRWidget.load("wyndhamWidget");

		}
		catch(e)
		{
			// widget failed to load or initialize
			$('#bookingWidgetDown').show();
			console.log("WRWidget failed to load:")
			console.log(e);
		}
	}			
</script>
<div id="bookingWidgetDown" style="display:none">
<span id="bannerArea" style="display: none;"><content tag="bannerSnippet"></content></span>

<div id="iWidget" class="widgetError">
	<div class="home_widget">
		<div class="widget_wrap" id="widget_wrap">
	    	<div class="widget_box">
				<div class="top_cap png_bg"></div>
				<div class="mid_section png_bg">
					<div class="btn_box1">
					    <div class="review_btn">
					        <div class="up">
					            <div class="over review1">
					                <span>Review Reservation</span>
					            </div>
					        </div>
					    </div>
					
					    <div class="search_btn">
					        <div class="up">
					            <div class="over">
					                <span>Search</span>
					            </div>
					        </div>
					    </div>
					</div><!-- END BUTTON BOX -->
					<div class="error">
						<h2>Our reservation system is temporarily unavailable.</h2><p>Our site is currently undergoing scheduled maintenance and upgrades, but will return shortly. We sincerely apologize for any inconvenience. Thank you for your patience.</p>                                   
					</div>
				</div>
				<div class="btm_cap_fade png_bg"></div>
				<div class="btm_cap png_bg"></div>
			</div>
		</div>
	</div><!-- end search module -->
</div><!-- end iWidget wrapping div -->
			
	</div>