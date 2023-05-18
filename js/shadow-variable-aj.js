/* 
Utilisation de const pour la variable Kudos au lieu de Var car ce'est une variable qui ne changera pas
Utilisation de la variable TotalKudos pour que ce soit plus clair dans le code
Utilisation de for of au lieu de for in car c'est plus approprié pour itérer les étéments d'un tableau.
*/

const articleList = []; 
const kudos = 5;

function calculateTotalKudos(articles) {
  let totalKudos = 0;
  
  for (const article of articles) {
    totalKudos += article.kudos;
  }
  
  return totalKudos;
}

document.write(`
  <p>Maximum kudos you can give to an article: ${kudos}</p>
  <p>Total Kudos already given across all articles: ${totalKudos}</p>
`);

