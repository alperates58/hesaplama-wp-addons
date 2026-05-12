function hcPankekHesapla() {
    const count = parseInt(document.getElementById('hc-ppp-count').value);

    if (!count || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    // Base for 1 person (approx 4-5 pancakes)
    const flour = 95; // g
    const milk = 150; // ml
    const eggs = 0.5; // half egg
    const sugar = 1; // tbsp
    const butter = 1; // tbsp

    const resultDiv = document.getElementById('hc-pancake-per-person-result');
    document.getElementById('hc-ppp-res-flour').innerText = Math.round(count * flour) + ' g';
    document.getElementById('hc-ppp-res-milk').innerText = Math.round(count * milk) + ' ml';
    document.getElementById('hc-ppp-res-egg').innerText = Math.ceil(count * eggs) + ' Adet';
    document.getElementById('hc-ppp-res-other').innerText = (count * sugar) + ' Kaşık';
    
    resultDiv.classList.add('visible');
}
