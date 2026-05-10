function hcKediYasiHesapla() {
    const age = parseInt(document.getElementById('hc-ky-age').value);

    if (isNaN(age) || age < 0) {
        alert('Lütfen geçerli bir yaş giriniz.');
        return;
    }

    let humanAge = 0;
    let stage = "";

    if (age === 0) {
        humanAge = 0;
        stage = "Yavru";
    } else if (age === 1) {
        humanAge = 15;
        stage = "Genç";
    } else if (age === 2) {
        humanAge = 24;
        stage = "Genç Yetişkin";
    } else {
        humanAge = 24 + (age - 2) * 4;
        if (age <= 6) stage = "Yetişkin";
        else if (age <= 10) stage = "Olgun";
        else if (age <= 14) stage = "Yaşlı (Senior)";
        else stage = "Geriatrik";
    }

    const resVal = document.getElementById('hc-ky-res-val');
    const resStage = document.getElementById('hc-ky-res-stage');

    resVal.innerText = humanAge + " Yaş";
    resStage.innerText = "Yaşam Evresi: " + stage;

    document.getElementById('hc-kedi-yasi-result').classList.add('visible');
}
