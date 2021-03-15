<?php 
	
	namespace app\components;
	use Yii;
	use yii\base\Widget;
	use app\modules\admin\models\Doctor;
	use app\models\Speciality;

	class DoctorWidget extends Widget {

		public $tpl;
		public $model;
		public $data;
		public $tree;
		public $menuHtml;

		public function init(){

			parent::init();
			if ($this->tpl === null){
				$this->tpl = 'menu';
			}
			$this->tpl .= '.php';

		}

		public function run(){

			// cache
			if ($this->tpl == 'menu.php'){
				$menu = Yii::$app->cache->get('menu');
				if ($menu) return $menu;
			}

			$this->data = Doctor::find()->indexBy('id')->all();
			$this->tree = $this->data;
			$this->menuHtml = $this->getMenuHtml($this->tree);
			// set cache
			if ($this->tpl == 'menu.php'){
				Yii::$app->cache->set('menu', $this->menuHtml, 60);
			}
			return $this->menuHtml;

		}

		protected function getTree(){
			$tree = [];
			foreach ($this->data as $item) {
				$tree[] = $item;
			}
			return $tree;
		}

		protected function getMenuHtml($tree, $tab = ''){
			$str = '';
			foreach ($tree as $category) {
				$str .= $this->catToTemplate($category, $tab);
			}
			return $str;
		}

		protected function catToTemplate($category, $tab){
			ob_start();
			include __DIR__ . '/menu_tpl/' . $this->tpl;
			return ob_get_clean();
		}

	}
 ?>