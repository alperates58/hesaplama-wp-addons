function hcPortionControlHesapla() {
    const goal = parseFloat(document.getElementById('hc-pco-goal').value);
    const density = parseFloat(document.getElementById('hc-pco-dense').value);

    if (isNaN(goal) || goal <= 0) {
        alert('Lütfen hedef kaloriyi giriniz.');
        return;
    }

    // density birimi kcal/g (örn: 1.5 kcal/g = 150 kcal/100g)
    const weight = goal / density;

    document.getElementById('hc-pco-val').innerText = Math.round(weight) + ' g';
    document.getElementById('hc-pco-info').innerText = `Bu kalori hedefine ulaşmak için tabağınızdaki yemeğin toplam ağırlığı yaklaşık ${Math.round(weight)} gram olmalıdır.`;
    
    document.getElementById('hc-portion-control-result').classList.add('visible');
}
