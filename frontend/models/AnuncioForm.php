<?php

namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile;
use common\models\Localizacao;
use common\models\Anuncio;
use common\models\Foto;
use Yii;

class AnuncioForm extends Model
{
    // Dados do anúncio
    public $titulo;
    public $descricao;
    public $preco;
    public $tipologia;
    public $area;
    public $caracteristicasadicionais;
    public $categoriaid;
    public $estadoanuncioid;

    // Localização
    public $distrito;
    public $concelho;
    public $freguesia;
    public $moradacompleta;
    public $porta;
    public $escolas;
    public $transportes;
    public $supermercados;

    // Upload
    /** @var UploadedFile[] */
    public $imageFiles;

    public $id;


    public function rules()
    {
        return [
            // obrigatórios
            [[
                'titulo', 'descricao', 'preco', 'tipologia', 'area',
                'categoriaid', 'distrito', 'concelho', 'freguesia',
                'moradacompleta', 'porta'
            ], 'required'],

            // inteiros
            [['area', 'porta', 'escolas', 'transportes', 'supermercados', 'categoriaid', 'estadoanuncioid'], 'integer'],

            // textos
            [['titulo', 'descricao', 'tipologia'], 'string', 'max' => 255],
            [['caracteristicasadicionais'], 'string', 'max' => 5000],

            // preço
            ['preco', 'number', 'min' => 0],

            // uploads
            [
                'imageFiles', 'file',
                'extensions' => 'png, jpg, jpeg',
                'maxFiles' => 10,
                'skipOnEmpty' => true
            ],
        ];
    }


    public function createAnuncio()
    {
        // // 1) Carregar ficheiros antes da validação
        // $this->imageFiles = UploadedFile::getInstances($this, 'imageFiles');

        if (!$this->validate()) {
            return false;
        }

        // 2) Criar localização
        $loc = new Localizacao();
        $loc->distrito = $this->distrito;
        $loc->concelho = $this->concelho;
        $loc->freguesia = $this->freguesia;
        $loc->moradacompleta = $this->moradacompleta;
        $loc->porta = $this->porta;
        $loc->escolas = $this->escolas ?? 0;
        $loc->transportes = $this->transportes ?? 0;
        $loc->supermercados = $this->supermercados ?? 0;
        $loc->save(false);

        // 3) Criar anúncio
        $anuncio = new Anuncio();
        $anuncio->titulo = $this->titulo;
        $anuncio->descricao = $this->descricao;
        $anuncio->preco = $this->preco;
        $anuncio->tipologia = $this->tipologia;
        $anuncio->area = $this->area;
        $anuncio->caracteristicasadicionais = $this->caracteristicasadicionais;
        $anuncio->categoriaid = $this->categoriaid;
        $anuncio->localizacaoid = $loc->id;
        $anuncio->userprofileid = Yii::$app->user->identity->profile->id;
        $anuncio->save(false);

        $this->id = $anuncio->id;

        // 4) Guardar fotos
        $this->uploadFotos($anuncio->id);

        return true;
    }


    public function uploadFotos($anuncioId)
    {
        if (!$this->imageFiles) {
            return;
        }

        $ordem = 1;

        foreach ($this->imageFiles as $file) {
            $fileName = Yii::$app->security->generateRandomString() . '.' . $file->extension;
            $absolutePath = Yii::getAlias('@frontend/web/uploads/') . $fileName;

            // guarda o ficheiro fisicamente
            $file->saveAs($absolutePath);

            // registo da imagem
            $foto = new Foto();
            $foto->anuncioid = $anuncioId;
            $foto->nomefoto = $fileName;
            $foto->ordem = $ordem++;
            $foto->save(false);
        }
    }

    public function updateAnuncio($anuncio)
    {
        // 1) Carregar ficheiros antes da validação
        $this->imageFiles = UploadedFile::getInstances($this, 'imageFiles');

        if (!$this->validate()) {
            return false;
        }

        // 2) Atualizar localização
        $loc = $anuncio->localizacao ?? new Localizacao();
        $loc->distrito = $this->distrito;
        $loc->concelho = $this->concelho;
        $loc->freguesia = $this->freguesia;
        $loc->moradacompleta = $this->moradacompleta;
        $loc->porta = $this->porta;
        $loc->escolas = $this->escolas ?? 0;
        $loc->transportes = $this->transportes ?? 0;
        $loc->supermercados = $this->supermercados ?? 0;
        $loc->save(false);

        // 3) Atualizar anúncio
        $anuncio->titulo = $this->titulo;
        $anuncio->descricao = $this->descricao;
        $anuncio->preco = $this->preco;
        $anuncio->tipologia = $this->tipologia;
        $anuncio->area = $this->area;
        $anuncio->caracteristicasadicionais = $this->caracteristicasadicionais;
        $anuncio->categoriaid = $this->categoriaid;
        $anuncio->localizacaoid = $loc->id;
        $anuncio->estadoanuncioid = $this->estadoanuncioid;
        $anuncio->save(false);

        // 4) Guardar fotos novas se houver
        $this->uploadFotos($anuncio->id);

        $this->id = $anuncio->id;

        return true;
    }


    public function loadFromModel($anuncio)
    {
        $this->id = $anuncio->id;
        $this->titulo = $anuncio->titulo;
        $this->descricao = $anuncio->descricao;
        $this->preco = $anuncio->preco;
        $this->tipologia = $anuncio->tipologia;
        $this->area = $anuncio->area;
        $this->caracteristicasadicionais = $anuncio->caracteristicasadicionais;
        $this->categoriaid = $anuncio->categoriaid;

        // Se o anúncio tiver localização
        if ($anuncio->localizacao) {
            $this->distrito = $anuncio->localizacao->distrito;
            $this->concelho = $anuncio->localizacao->concelho;
            $this->freguesia = $anuncio->localizacao->freguesia;
            $this->moradacompleta = $anuncio->localizacao->moradacompleta;
            $this->porta = $anuncio->localizacao->porta;
            $this->escolas = $anuncio->localizacao->escolas;
            $this->transportes = $anuncio->localizacao->transportes;
            $this->supermercados = $anuncio->localizacao->supermercados;
        }
    }

}
