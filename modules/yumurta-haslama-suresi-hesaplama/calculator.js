function hcYumurtaSuresiGoster() {
    const style = document.getElementById('hc-eb-style').value;
    const resultDiv = document.getElementById('hc-egg-boil-result');
    const resList = document.getElementById('hc-eb-res-list');

    if (!style) {
        resultDiv.classList.remove('visible');
        return;
    }

    let desc = "";
    if (style == "3") desc = "Beyazı tam pişmemiş, sarısı tamamen akışkan.";
    if (style == "5") desc = "Beyazı pişmiş, sarısı macun kıvamında (turuncu).";
    if (style == "8") desc = "Sarısı tam pişmiş ama hala canlı sarı renkte.";
    if (style == "12") desc = "Tamamen katı, sarısı açık sarı renkte.";

    resList.innerHTML = `
        <div class="hc-result-item"><span>Hedef Süre:</span> <strong>${style} Dakika</strong></div>
        <div class="hc-result-item"><span>Sonuç:</span> <strong>${desc}</strong></div>
    `;

    resultDiv.classList.add('visible');
}
