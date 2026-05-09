function hcGramToCupHesapla() {
    const mat = document.getElementById('hc-gc-material').value;
    const grams = parseFloat(document.getElementById('hc-gc-grams').value) || 0;

    let density = 1; // gr/ml (Su)
    switch(mat) {
        case 'water': density = 1; break;
        case 'flour': density = 0.6; break;
        case 'sugar': density = 0.85; break;
        case 'oil': density = 0.9; break;
        case 'rice': density = 0.8; break;
        case 'milk': density = 1.03; break;
    }

    const cups = grams / (200 * density);

    document.getElementById('hc-res-gc-cup').innerText = cups.toFixed(2) + ' Bardak';
    document.getElementById('hc-gram-to-cup-result').classList.add('visible');
}
