<?php
namespace common\components\flashmessage;

use yii;
use yii\base\Component;

/**
* for displaying messages
*/
class flashMessage extends Component
{
	public function getFlash()
	{
		if (Yii::$app->session->hasFlash('success'))
		{
			$data = '<div style="height:45px;" class="alert alert-success alert-dismissable" id="successMessage">
			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>';
			$data.= '<h5 style="margin-top:-1px;"><i class="icon fa fa-check"></i>'.Yii::$app->session->getFlash('success').'!</h5>';
			$data.= '</div>';
		}
		else
		{
			$data= '';
		}
		return $data;
	}

	public function setFlash($type)
	{
		Yii::$app->session->setFlash('success', $type);
	}

	public function jsFlashCode()
	{ ?>
		<script type="text/javascript">
			setTimeout(function() {
			$('#successMessage').fadeOut('fast');
			}, 5000); // <-- time in milliseconds
		</script>
	<?php
	}
}

?>