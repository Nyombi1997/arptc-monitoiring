let
time_publication = document.querySelectorAll("#time_publication");
function timeAgo(dateString) {
    const past = new Date(dateString); // Date depuis MySQL ou autre
    const now = new Date();

    const diff = now - past; // différence en millisecondes

    const seconds = Math.floor(diff / 1000);
    const minutes = Math.floor(diff / 60 / 1000);
    const hours   = Math.floor(diff / 3600 / 1000);
    const days    = Math.floor(diff / 86400 / 1000);
    const weeks   = Math.floor(days / 7);
    const months  = Math.floor(days / 30);
    const years   = Math.floor(days / 365);

    if (years > 0) return years === 1 ? "il y a 1 an" : `il y a ${years} ans`;
    if (months > 0) return months === 1 ? "il y a 1 mois" : `il y a ${months} mois`;
    if (weeks > 0) return weeks === 1 ? "il y a 1 semaine" : `il y a ${weeks} semaines`;
    if (days > 0) return days === 1 ? "il y a 1 jour" : `il y a ${days} jours`;
    if (hours > 0) return hours === 1 ? "il y a 1 heure" : `il y a ${hours} heures`;
    if (minutes > 0) return minutes === 1 ? "il y a 1 minute" : `il y a ${minutes} minutes`;
    return "il y a un instant";
}
setTimeout(() => {
    time_publication.forEach(function(element){
        let 
        date = element.getAttribute("data-date")
        ;
        element.innerHTML = timeAgo(date);
    })    
}, 500);
setInterval(() => {
    time_publication.forEach(function(element){
        let 
        date = element.getAttribute("data-date")
        ;
        element.innerHTML = timeAgo(date);
    })
}, 30000);

/* vérifier s'il y'a plusiseurs images */
let 
div_images_publication_video_js = document.querySelectorAll('#div_images_publication_video_js');
div_images_publication_video_js.forEach(function(element){
    let
    images = element.querySelectorAll(" #publication_image_js");
    if(images.length == 1)
    {
        element.classList.add("full");
        images[0].classList.add("full");
    }
})