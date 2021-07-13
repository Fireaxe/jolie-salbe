<template>
  <layout-basic>
    <div class="container-fluid">
      <section id="legals" class="legals" style="margin-top: 150px;">
        <h1>MENTIONS LEGALES :</h1>
        <p style="text-align:justify"><strong>ÉDITEUR</strong></p>

        <p style="text-align:justify">
          Le site
          <a
              href="http://www.jolysable.fr"
              style="color: rgb(7, 130, 193); font-family: sans-serif, Arial, Verdana, "
              target="_blank"
          >www.jolysable.fr</a
          >est la propriété exclusive de <strong>SAS </strong
        ><strong>Jolysable</strong>, qui l'édite.
        </p>

        <p style="text-align:justify">
          <strong>Jolysable</strong><strong> </strong><br/>
          <strong>SAS </strong>au capital de<strong> </strong
        ><strong>2000 </strong>€Tél : <strong>0662668717</strong>
        </p>

        <p style="text-align:justify">
          <strong>14 rue des fontaines </strong><strong>17800 Pons</strong
        ><br/>
          Immatriculée au Registre du Commerce et des Sociétés de
          <strong>Saintes </strong>sous le numéro<strong> </strong
        ><strong>8142150000033</strong><strong> </strong>
        </p>

        <p style="text-align:justify">
          Numéro TVA intracommunautaire : <strong>FR33</strong><br/>
          Adresse de courrier électronique :
          <strong>stein.claire24@gmail.com</strong> <br/>
          <br/>
          Directeur de la  publication : <strong>Claire Saunal</strong><br/>
          Contactez le responsable de la publication :
          <strong>stein.claire24@gmail.com</strong>
        </p>

        <p>CNIL n°1516168</p>
        <p style="text-align:justify">
          <strong> </strong><br/>
          Conformément aux dispositions des articles 6-III et 19 de la Loi n°
          2004-575 du 21 juin 2004 pour la Confiance dans l'économie numérique,
          dite L.C.E.N., nous portons à la connaissance des utilisateurs et
          visiteurs du site :
          <a href="http://www.jolysable.fr" target="_blank">www.jolysable.fr</a>
          les informations suivantes :
        </p>

        <p style="text-align:justify"><strong>HÉBERGEMENT</strong></p>

        <p style="text-align:justify">
          Le site est hébergé par
          <strong>Amazon AWS amazon.com 98101 Seattle</strong><br/>
        </p>
      </section>
    </div>
  </layout-basic>
</template>

<script>
  import LayoutBasic from '../layouts/LayoutBasic.vue'
  import '../assets/sass/views/home.scss'

  export default {
    name: 'Legal',
    components: {
      LayoutBasic,
    },
  }
</script>
