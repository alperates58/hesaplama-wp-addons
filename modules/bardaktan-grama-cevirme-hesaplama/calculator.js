function hcCupToGramHesapla() {
    const mat = document.getElementById('hc-cg-material').value;
    const cups = parseFloat(document.getElementById('hc-cg-cups').value) || 0;

    let density = 1; // gr/ml (Su)
    switch(mat) {
        case 'water': density = 1; break;
        case 'flour': density = 0.6; break;
        case 'sugar': density = 0.85; break;
        case 'oil': density = 0.9; break;
        case 'rice': density = 0.8; break;
        case 'milk': density = 1.03; break;
    }

    const gram = cups * 200 * density;

    document.getElementById('hc-res-cg-gram').innerText = Math.round(gram) + ' gr';
    document.getElementById('hc-cup-to-gram-result').classList.add('visible');
}
