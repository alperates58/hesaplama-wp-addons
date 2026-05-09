function hcDBEHesapla() {
    const lambdaNm = parseFloat(document.getElementById('hc-dbe-lambda').value);

    if (isNaN(lambdaNm) || lambdaNm <= 0) {
        alert('Lütfen geçerli bir dalga boyu giriniz.');
        return;
    }

    const h = 6.62607015e-34;
    const c = 299792458;
    const lambda = lambdaNm * 1e-9;

    const energyJoule = (h * c) / lambda;
    const energyEv = energyJoule / 1.602176634e-19;

    document.getElementById('hc-dbe-joule').innerText = energyJoule.toExponential(4) + ' J';
    document.getElementById('hc-dbe-ev').innerText = energyEv.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' eV';
    
    document.getElementById('hc-dbe-result').classList.add('visible');
}
