function measureBMI() {
    // true = metric, false = imperial
    let unit = document.getElementById("bmi-metric").checked,
        weight = document.getElementById("bmi-weight"),
        weightu = document.getElementById("bmi-weight-unit"),
        height = document.getElementById("bmi-height"),
        heightu = document.getElementById("bmi-height-unit");

    if (unit) {
        weightu.innerHTML = "KG";
        weight.min = 1;
        weight.max = 635;
        heightu.innerHTML = "CM";
        height.min = 54;
        height.max = 272;
    } else {
        weightu.innerHTML = "LBS";
        weight.min = 2;
        weight.max = 1400;
        heightu.innerHTML = "IN";
        height.min = 21;
        height.max = 107;
    }
}