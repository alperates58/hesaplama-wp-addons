function hcPastaPlanla() {
    const count = parseInt(document.getElementById('hc-cpp-count').value);

    if (!count || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    const resList = document.getElementById('hc-cpp-res-list');
    let suggestions = '';

    if (count <= 12) {
        suggestions = `<div class="hc-result-item"><span>Tek Kat:</span> <strong>18-20 cm Çap</strong></div>`;
    } else if (count <= 25) {
        suggestions = `<div class="hc-result-item"><span>Tek Kat:</span> <strong>24-26 cm Çap</strong></div>`;
    } else if (count <= 45) {
        suggestions = `
            <div class="hc-result-item"><span>Tek Kat:</span> <strong>32-35 cm Çap</strong></div>
            <div class="hc-result-item"><span>2 Katlı:</span> <strong>24 cm + 16 cm</strong></div>
        `;
    } else if (count <= 80) {
        suggestions = `
            <div class="hc-result-item"><span>2 Katlı:</span> <strong>28 cm + 18 cm</strong></div>
            <div class="hc-result-item"><span>3 Katlı:</span> <strong>25 cm + 18 cm + 12 cm</strong></div>
        `;
    } else {
         suggestions = `
            <div class="hc-result-item"><span>3 Katlı:</span> <strong>30 cm + 22 cm + 15 cm</strong></div>
            <div class="hc-result-item"><span>4 Katlı:</span> <strong>32 cm + 25 cm + 18 cm + 12 cm</strong></div>
        `;
    }

    resList.innerHTML = suggestions;
    document.getElementById('hc-cake-planner-result').classList.add('visible');
}
