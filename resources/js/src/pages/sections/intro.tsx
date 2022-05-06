import { Box, Flex, Heading, Link, Text, Icon, Img, AspectRatio } from "@chakra-ui/react";
import React from "react";
import { BsSearch } from "react-icons/bs";
import computer2 from "../../images/computer2.png"

export const Intro = () => {
    return (
        <Box w="full" bg="brand.200" px="170px" py="40px" mb="120px">
            <Flex justifyContent="space-between" alignItems="center" pb="60px">
                <Heading color="whiteAlpha.900" fontSize={40} letterSpacing="4px">Encontre sua vaga de emprego</Heading>
                <Box maxW="300px">
                    <AspectRatio w="full" ratio={5 / 4} maxW="600px" pb="20px">
                        <Img src={computer2} pb="20px" />
                    </AspectRatio>
                    <Text color="whiteAlpha.600" pb="20px" >
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </Text>
                    <Link color="whiteAlpha.600" pb="20px">
                        <Icon as={BsSearch} color="brand.100" mr="10px" h={5} w={5} />Buscar
                    </Link>
                </Box>
            </Flex >

        </Box >
    )
}; 
