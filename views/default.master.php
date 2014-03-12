<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-ca">
<head> <?php $this->RenderAsset('Head'); ?>
<script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'blackglass'
 };
 </script>
<link rel="apple-touch-icon" href="images/apple-touch-icon57x57.png">
<link rel="shortcut-icon" type="image/x-icon" href="images/favicon.ico">
<link rel="apple-touch-icon" href="images/favicon.png">
</head>
<body id="<?php echo $BodyIdentifier; ?>" class="<?php echo $this->CssClass; ?>">
   <div id="Frame">
      <div id="Head">
<div class="Logo">

</div>
         <div class="Menu">
				<h1><span ><?php echo Gdn_Theme::Logo(); ?></span></a></h1>

            <?php
			      $Session = Gdn::Session();
					if ($this->Menu) {
						$this->Menu->AddLink('Dashboard', T('Dashboard'), '/dashboard/settings', array('Garden.Settings.Manage'));
						// $this->Menu->AddLink('Dashboard', T('Users'), '/user/browse', array('Garden.Users.Add', 'Garden.Users.Edit', 'Garden.Users.Delete'));
                                                $this->Menu->AddLink('Home', T('Home'), 'http://www.yoursite.com');
                                                $this->Menu->AddLink('Home', T('Facebook'),'http://www.facebook.com/'); 
						$this->Menu->AddLink('Activity', T('Activity'),'/activity');
                                                $this->Menu->AddLink('Categories', T('Categories'),'categories/all');
                                                $this->Menu->AddLink('Home', T('Mobile View'),'profile/mobile');
                                                $this->Menu->AddLink('Home',T('New Discussion'),'/post/discussion', array('Garden.SignIn.Allow'), array(), array('target' => '_blank'));
			         $Authenticator = Gdn::Authenticator();
						if ($Session->IsValid()) {
							$Name = $Session->User->Name;
							$CountNotifications = $Session->User->CountNotifications;
							if (is_numeric($CountNotifications) && $CountNotifications > 0)
								$Name .= ' <span>'.$CountNotifications.'</span>';
								
							$this->Menu->AddLink('User', $Name, '/profile/{UserID}/{Username}', array('Garden.SignIn.Allow'), array('class' => 'UserNotifications'));
							$this->Menu->AddLink('SignOut', T('Sign Out'), $Authenticator->SignOutUrl(), FALSE, array('class' => 'NonTab SignOut'));
						} else {
							$Attribs = array();
							if (C('Garden.SignIn.Popup') && strpos(Gdn::Request()->Url(), 'entry') === FALSE)
								$Attribs['class'] = 'SignInPopup';
								
							$this->Menu->AddLink('Entry', T('Sign In'), $Authenticator->SignInUrl($this->SelfUrl), FALSE, array('class' => 'NonTab'), $Attribs);
						}
						echo $this->Menu->ToString();
					}
				?>
 <div class="menu-bar" style="position:relative;width:165px;margin-left:77%;" >
<ul id="menu-bar" style="z-index:4;position:relative;">
 <li class="current">
 <li><a href="#">I N D E X</a>
  <ul>
   <li><a href="http://www.yoursite.com/forum/post/discussion">New Discussion</a></li>
   <li><a href="http://www.yoursite.com/forum/categories/all">Categories</a></li>
   <li><a href="http://www.yoursite.com/forum/categories/general">General</a></li>
   <li><a href="http://www.yoursite.com/forum/discussions">All Discussions</a></li>
   <li><a href="http://www.yoursite.com/forum/entry/register?Target=discussions">Sign Up</a></li>
   <li><a href="http://www.yoursite.com/home.html">Home</a>
   <li><a href="http://www.yoursite.com/blog/">MY BLOG</a></li>
   <li><a href="http://www.yoursite.com/my_music.html">MY MUSIC</a></li>
   <li><a href="http://www.yoursite.com/forum/">MY FORUM</a></li>
   <li><a href="http://mydatabass.com/links.html">LINKS 4BASS</a></li>
   <li><a href="http://cdn.cloudrad.io/bass-on-the-broadban/player" target="_blank">BOTB Player</a></li>
   <li><a href="http://www.yoursite.com/links.html">LINKS</a></li>
   <li><a href="http://www.yoursite.com/policy.html">TERMS OF USE</a></li>
   <li><a href="http://www.yoursite.com/flash_info.html">FLASH INFO</a></li>
   <li><a href="http://www.yoursite.com/privacy.html">PRIVACY</a></li>
   <li><a href="http://www.yoursite.com/cookies_info.html">COOKIES</a></li>
   <li><a href="http://www.yoursite.com/biography.html">ABOUT</a></li>
   <li><a href="mailto:contact@yoursite.com">CONTACT</a></li>
  </ul>
 </li></div>     
           </div> 
      </div>
      <div id="Body">
         <div id="Content"><?php $this->RenderAsset('Content'); ?>
</div>
         <div id="Panel"><div class="Search"><p>
<?php
					$Form = Gdn::Factory('Form');
					$Form->InputPrefix = '';
					echo 
						$Form->Open(array('action' => Url('/search'), 'method' => 'get')),
						$Form->TextBox('Search'),
						$Form->Button('Go', array('Name' => '')),
						$Form->Close();
				?></div></p>
 <?php $this->RenderAsset('Panel'); ?>
<p class="Center">
<iframe id="onlineRadioFrame" frameborder="0" width="240" height="292" scrolling="no" src="http://radiotuna.com/OnlineRadioPlayer/Player?showPopupControl=true&amp;playerParams={'styleSelection0':96,'styleSelection1':63,'styleSelection2':22,'textColor':12237498,'backgroundColor':4144959,'buttonColor':16773140,'glowColor':16773140,'playerSize':240,'playerType':'style'}&amp;linkText=internet%20radio&amp;linkDest=http://radiotuna.com/" allowtransparency="true" style="border:2px solid #666;border-radius:10px;"></iframe></p>

</div>

</div>
        </div>

      </div><br><br>
      <div id="Foot"><p id="back-top" style="float: right;top:100px; display:inline- block; position:relative;right:0px;"><a href="#top" title="Back to Top"><img src="images/back-up1.png"></a></p>
  <?php
			      $Session = Gdn::Session();
					if ($this->Menu) {
						// $this->Menu->AddLink('Dashboard', T('Users'), '/user/browse', array('Garden.Users.Add', 'Garden.Users.Edit', 'Garden.Users.Delete'));
                                                $this->Menu->AddLink('Discussions', T('Discussions'), '/discussions');
						$this->Menu->AddLink('Mobile View', T('Mobile View'), 'profile/mobile'); 
                                                $this->Menu->AddLink('Home', T('Home'),'/'); 
                                               
                                                $this->Menu->AddLink('New Discussion',T('New Discussion'),'/post/discussion', array('Garden.SignIn.Allow'), array(), array('target' => '_blank'));
			                        $Authenticator = Gdn::Authenticator();
						if ($Session->IsValid()) {
							$this->Menu->AddLink('SignOut', T('Sign Out'), $Authenticator->SignOutUrl(), FALSE, array('class' => 'NonTab SignOut'));
						} else {
							$Attribs = array();
							if (C('Garden.SignIn.Popup') && strpos(Gdn::Request()->Url(), 'entry') === FALSE)
								$Attribs['class'] = 'SignInPopup';
								
							$this->Menu->AddLink('Entry', T('Sign In'), $Authenticator->SignInUrl($this->SelfUrl), FALSE, array('class' => 'NonTab'), $Attribs);
						}
						echo $this->Menu->ToString();
					}
				?>
		
	  </div>
   </div><?php
				$this->RenderAsset('Foot');
				echo Wrap(Anchor(T('Vanilla Theme by VrijVlinder'), C('Garden.VanillaUrl'),array('target' => '_blank')), 'div');
			?><p></p>
<div id="translate-this"><a style="width:180px;height:18px;float:none;display:inline-block;" class="translate-this-button" href="http://www.translatecompany.com/">Translate Company</a></div>

<script type="text/javascript" src="http://x.translateth.is/translate-this.js"></script>
<script type="text/javascript">
TranslateThis();
</script>

<script type="text/javascript"> $(document).ready(function() {
   $(".Attachment a").attr("target", '_blank');
   $("#Foot ul#Menu a").attr("target", '_blank');
});
</script>

<script type="text/javascript">

// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});
</script>

	<?php $this->FireEvent('AfterBody'); ?>
</body>
</html>