function hcPankekOlçekle() {
    const eggs = parseInt(document.getElementById('hc-ps-eggs').value);

    if (!eggs || eggs <= 0) {
        alert('Lütfen yumurta sayısını giriniz.');
        return;
    }

    // Base per 1 egg
    const flour = 130; // g
    const milk = 240; // ml
    const sugar = 2; // tbsp
    const butter = 2; // tbsp
    const bakingPowder = 1; // tsp

    const resList = document.getElementById('hc-ps-res-list');
    resList.innerHTML = `
        <div class="hc-result-item"><span>Un:</span> <strong>${(eggs * flour).toLocaleString('tr-TR')} g</strong></div>
        <div class="hc-result-item"><span>Süt:</span> <strong>${(eggs * milk).toLocaleString('tr-TR')} ml</strong></div>
        <div class="hc-result-item"><span>Şeker:</span> <strong>${(eggs * sugar)} Yemek Kaşığı</strong></div>
        <div class="hc-result-item"><span>Erimiş Tereyağı:</span> <strong>${(eggs * butter)} Yemek Kaşığı</strong></div>
        <div class="hc-result-item"><span>Kabartma Tozu:</span> <strong>${(eggs * bakingPowder)} Tatlı Kaşığı</strong></div>
    `;

    document.getElementById('hc-pancake-scaling-result').classList.add('visible');
}
