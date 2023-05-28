import * as brain from "brain.js";

const trainingData = [
    { input: { gender: 1, first: 4, second: 1, third: 4, forth: 1, fifth: 1, sixth: 3, seventh:1, eighth: 1}, output: {concert: 1}},
    { input: { gender: 1, first: 3, second: 2, third: 1, forth: 1, fifth: 1, sixth: 3, seventh:2, eighth: 2}, output: {concert: 1, humor: 1} },
    { input: { gender: 1, first: 4, second: 2, third: 3, forth: 2, fifth: 1, sixth: 3, seventh:2, eighth: 2}, output: {humor: 1, theatre: 1}},
    { input: { gender: 1, first: 4, second: 1, third: 4, forth: 2, fifth: 1, sixth: 2, seventh:2, eighth: 2}, output: {filmHorror: 1, concert: 1, filmFantastic: 1}},
    { input: { gender: 1, first: 3, second: 1, third: 1, forth: 2, fifth: 1, sixth: 3, seventh:1, eighth: 2}, output: {filmComedy: 1}},
    { input: { gender: 1, first: 2, second: 2, third: 1, forth: 1, fifth: 1, sixth: 3, seventh:2, eighth: 2}, output: {filmDrama: 1, filmComedy: 1}},
    { input: { gender: 1, first: 3, second: 1, third: 1, forth: 1, fifth: 2, sixth: 2, seventh:1, eighth: 2}, output: {cartoon: 1}},

    { input: { gender: 2, first: 3, second: 1, third: 1, forth: 1, fifth: 2, sixth: 1, seventh:1, eighth: 2}, output: {humor: 1, filmAction: 1}},
    { input: { gender: 2, first: 2, second: 1, third: 1, forth: 3, fifth: 1, sixth: 2, seventh:1, eighth: 1}, output: {concert: 1}},
    { input: { gender: 2, first: 3, second: 2, third: 2, forth: 1, fifth: 2, sixth: 1, seventh:2, eighth: 1}, output: {filmAction: 1, theatre: 1, concert: 1}},
    { input: { gender: 2, first: 2, second: 3, third: 4, forth: 3, fifth: 1, sixth: 3, seventh:1, eighth: 2}, output: {theatre: 1, filmDrama: 0.8}},
    { input: { gender: 2, first: 3, second: 2, third: 3, forth: 3, fifth: 2, sixth: 3, seventh:1, eighth: 1}, output: {humor: 1, filmAction: 0.8}},
];

export const net = new brain.NeuralNetwork();
net.train(trainingData, {
    iterations: 2000,
    learningRate: 0.3,
    errorThresh: 0.005});
//const output = net.run({first: 1, second: 1, third: 1, forth: 1, fifth: 0, sixth: 0});
// const output = net.run({gender: 1, first: 3, second: 2, third: 3, forth: 3, fifth: 2, sixth: 3, seventh:1, eighth: 1});


