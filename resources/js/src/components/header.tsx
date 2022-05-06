import { Flex, Heading, HStack, Icon, Link } from "@chakra-ui/react";
import React from "react";
import { BsFillBriefcaseFill } from "react-icons/bs";

export const Header = () => {
    return (
        <Flex
            px="130px"
            py="30px"
            width="full"
            bg="brand.200"
            alignItems="flex-end"
            justifyContent="space-between"
        >
            <Flex alignItems='center'>
                <Heading
                    color="whiteAlpha.900"
                    mr="60px"
                    fontSize={20}
                    letterSpacing="1.5px"
                >
                    <Icon as={BsFillBriefcaseFill} color="brand.100" ml="10px" h={5} w={5} mb="-1" /> 1Job
                </Heading>

                <HStack color="whiteAlpha.700" spacing="40px">
                    <Link>Home</Link>
                    <Link>Vagas</Link>
                    <Link>Jornada</Link>
                </HStack>
            </Flex>
            <Flex alignItems="flex-end"
                justifyContent="space-between"
                mr="10px">
                <Link color="whiteAlpha.800">
                    Entrar
                </Link>
            </Flex>
        </Flex >
    );
};