<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
// import {
//     Accordion,
//     AccordionContent,
//     AccordionItem,
//     AccordionTrigger,
// } from '@/components/ui/accordion'
import { Badge } from '@/components/ui/badge';
import {
    NavigationMenu,
    NavigationMenuContent,
    NavigationMenuItem,
    NavigationMenuLink,
    NavigationMenuList,
    NavigationMenuTrigger,
} from '@/components/ui/navigation-menu';
import games from '@/routes/games';
import home from '@/routes/home';
import type { PokemonPageProps } from '@/types/pokemon';
defineProps<PokemonPageProps>();

</script>

<template>
    <div class="min-h-screen relative overflow-hidden">
        <div class="relative z-10">
            <header class="sticky top-0 z-50 border-b border-white/10">
                <nav class="w-10/12 mx-auto h-16 flex items-center">
                    <NavigationMenu>
                        <NavigationMenuList>
                            <NavigationMenuItem>
                                <NavigationMenuLink as-child>
                                    <Link :href="home.index().url" class="font-medium">
                                        Home
                                    </Link>
                                </NavigationMenuLink>
                            </NavigationMenuItem>
                            <NavigationMenuItem>
                                <NavigationMenuTrigger>Mis favoritos</NavigationMenuTrigger>
                                <NavigationMenuContent>
                                    <ul class="grid w-[400px] gap-2 md:w-[500px] md:grid-cols-2 lg:w-[600px]">

                                        <NavigationMenuLink as-child>
                                            <Link :href="games.lol().url">
                                                <div class="flex items-center gap-2 font-medium">
                                                    <img src="/icons/lol.png" width="32px" height="20px"
                                                        alt="League of Legends"> League of Legends
                                                </div>
                                                <div class="text-muted-foreground">
                                                    League of Legends es un juego de estrategia por equipos en el
                                                    que
                                                    dos
                                                    equipos de cinco campeones se enfrentan para ver quién destruye
                                                    antes la
                                                    base del otro.
                                                </div>
                                            </Link>
                                        </NavigationMenuLink>


                                        <NavigationMenuLink as-child>
                                            <Link :href="games.valorant().url">
                                                <div class="flex items-center gap-2 font-medium">
                                                    <img src="/icons/valorant.png" width="20px" height="20px"
                                                        alt="Valorant">
                                                    Valorant
                                                </div>
                                                <div class="text-muted-foreground">
                                                    Valorant es un juego de disparos en primera persona con
                                                    habilidades
                                                    de
                                                    personajes únicas en el que dos equipos de cinco jugadores se
                                                    enfrentan
                                                    para lograr objetivos específicos.
                                                </div>
                                            </Link>
                                        </NavigationMenuLink>

                                        <NavigationMenuLink as-child>
                                            <Link :href="games.pokemon().url">
                                                <div class="flex items-center gap-2 font-medium">
                                                    <img src="/icons/pokemon.png" width="20px" height="20px"
                                                        alt="Pokemon">
                                                    Pokemon
                                                </div>
                                                <div class="text-muted-foreground">
                                                    Pokemon es un juego de rol en el que los jugadores controlan a
                                                    sus
                                                    propios pokemon y se enfrentan a otros entrenadores.
                                                </div>
                                            </Link>
                                        </NavigationMenuLink>
                                    </ul>
                                </NavigationMenuContent>
                            </NavigationMenuItem>
                            <NavigationMenuItem>
                                <NavigationMenuItem>
                                    <NavigationMenuLink as-child>
                                        <Link :href="home.index().url" class="font-medium">
                                            Contacto
                                        </Link>
                                    </NavigationMenuLink>
                                </NavigationMenuItem>
                            </NavigationMenuItem>
                        </NavigationMenuList>
                    </NavigationMenu>
                </nav>
            </header>

            <main class="w-10/12 mx-auto mt-10">
                <div class="text-center w-full">
                    <h1 class="text-5xl font-bold">
                        Pokemon
                    </h1>
                </div>
                <article class="my-10">
                    <h2 class="text-2xl font-bold mb-5">¿Qué es?</h2>
                    <p>Pokémon es una franquicia de videojuegos creada por Satoshi Tajiri y desarrollada por Game Freak
                        en colaboración con Nintendo. Se centra en un mundo habitado por criaturas llamadas Pokémon, las
                        cuales poseen diferentes habilidades y características únicas.
                    </p>
                    <br>
                    <p> En estos juegos, los jugadores asumen el rol de entrenadores Pokémon, cuyo objetivo es capturar,
                        entrenar y fortalecer a estas criaturas para enfrentarse a otros entrenadores. Desde sus inicios
                        con títulos como Pokémon Red and Blue, la franquicia ha crecido hasta convertirse en un fenómeno
                        global con millones de seguidores.</p>
                    <br>
                    <p>Pokémon se caracteriza por su enfoque en la exploración, la colección y la estrategia, ofreciendo
                        una experiencia accesible para todo tipo de jugadores, pero con suficiente profundidad para
                        quienes buscan dominar sus mecánicas.</p>
                </article>
                <article class="my-10">
                    <h2 class="text-2xl font-bold mb-5">¿Cómo se juega?</h2>
                    <p>En Pokémon, el jugador recorre distintas regiones capturando Pokémon salvajes utilizando
                        herramientas como las Poké Balls. Cada Pokémon puede entrenarse mediante combates, ganando
                        experiencia para subir de nivel, aprender nuevos movimientos y evolucionar a formas más fuertes.
                    </p>
                    <br>
                    <p>En Pokémon, el jugador recorre distintas regiones capturando Pokémon salvajes utilizando
                        herramientas como las Poké Balls. Cada Pokémon puede entrenarse mediante combates, ganando
                        experiencia para subir de nivel, aprender nuevos movimientos y evolucionar a formas más fuertes.
                    </p>
                    <br>
                    <p>A lo largo del juego, los entrenadores deben enfrentarse a líderes de gimnasio, rivales y otros
                        desafíos con el objetivo de demostrar su habilidad. La meta final suele ser convertirse en el
                        mejor entrenador de la región, combinando estrategia, entrenamiento y una buena elección de
                        equipo.</p>
                </article>
                <article>
                    <h2 class="text-2xl font-bold mb-5 text-center">Juegos mas populares</h2>
                    <div class="w-full flex flex-wrap">
                        <div v-for="game in topGames" :key="game.name" class="w-4/12">
                            <h3 class="text-center my-5 font-bold">
                                {{ game.name.charAt(0).toUpperCase() + game.name.slice(1) }}
                            </h3>
                            <div class="flex justify-center">
                                <img :src="`/img/pokemon_${game.name}.jpg`" :alt="game.name" class="rounded-lg"
                                    width="80%">
                            </div>
                        </div>
                    </div>
                </article>
                <article class="my-20">
                    <h2 class="text-2xl font-bold mb-5 text-center">Pokemones iconicos</h2>
                    <div class="w-full flex flex-wrap">
                        <div v-for="pokemon in iconicPokemons" :key="pokemon.name" class="w-4/12">
                            <h3 class="text-center mt-10 font-bold">
                                {{ pokemon.name.charAt(0).toUpperCase() + pokemon.name.slice(1) }}
                            </h3>
                            <div class="flex justify-center">
                                <img :src="`/img/${pokemon.name}.webp`" :alt="pokemon.name" class="rounded-lg"
                                    width="80%">
                            </div>
                        </div>
                    </div>
                </article>
                <article class="my-20">
                    <h2 class="text-2xl font-bold mb-5 text-center">Mis pokemones favoritos</h2>
                    <div class="w-full flex flex-wrap">
                        <div v-for="pokemon in myFavoritesPokemons" :key="pokemon.name" class="w-6/12 flex flex-wrap">
                            <div class="w-full flex flex-wrap">
                                <div class="w-6/12">
                                    <h3 class="font-bold text-center">
                                        {{ pokemon.name.charAt(0).toUpperCase() + pokemon.name.slice(1) }}
                                    </h3>
                                    <div class="flex justify-center">
                                        <img :src="pokemon.sprite" :alt="pokemon.name" class="rounded-lg" width="80%">
                                    </div>
                                </div>
                                <div class="w-3/12">
                                    <h3>Tamaño</h3>
                                    <Badge class="me-5">
                                        {{ pokemon.height
                                        }} mts
                                    </Badge>
                                    <h3 class="mt-5">Peso</h3>
                                    <Badge class="me-5">
                                        {{ pokemon.weight
                                        }} kg
                                    </Badge>
                                    <h3 class="mt-5">Tipos</h3>
                                    <Badge class="me-5">
                                        {{ pokemon.types?.primary.charAt(0).toUpperCase() +
                                            pokemon.types?.primary.slice(1)
                                        }}
                                    </Badge>
                                    <Badge v-if="pokemon.types?.secondary" class="mt-2">
                                        {{ pokemon.types?.secondary.charAt(0).toUpperCase() +
                                            pokemon.types?.secondary.slice(1) }}
                                    </Badge>
                                    <h3 class="mt-5">Experiencia Base</h3>
                                    <Badge class="me-5">
                                        {{ pokemon.base_experience }}
                                    </Badge>
                                </div>
                                <div class="w-3/12">
                                    <h3>Estadisticas</h3>
                                    <Badge class="me-10"> Vida: {{ pokemon.stats.hp.base_stat }}</Badge>
                                    <Badge class="me-10"> Ataque: {{ pokemon.stats.attack.base_stat }}
                                    </Badge>
                                    <Badge class="me-10"> Defensa: {{ pokemon.stats.defense.base_stat }}
                                    </Badge>
                                    <Badge class="me-10"> Ataque Especial: {{ pokemon.stats['special-attack'].base_stat
                                        }}
                                    </Badge>
                                    <Badge class="me-10"> Defensa Especial: {{
                                        pokemon.stats['special-defense'].base_stat }}
                                    </Badge>
                                    <Badge class="me-10"> Velocidad: {{ pokemon.stats.speed.base_stat }}
                                    </Badge>
                                    <h3 class="mt-3">Habilidades</h3>
                                    <Badge class="me-10">{{ pokemon.abilities[0]?.name }}</Badge>
                                    <Badge v-if="pokemon.abilities[2]?.name" class="me-10">{{ pokemon.abilities[2]?.name
                                    }}
                                    </Badge>
                                    <Badge v-if="pokemon.abilities[3]?.name" class="me-10">{{ pokemon.abilities[3]?.name
                                    }}
                                    </Badge>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </main>
        </div>
    </div>

</template>
